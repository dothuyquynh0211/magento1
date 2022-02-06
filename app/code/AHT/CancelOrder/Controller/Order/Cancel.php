<?php

namespace AHT\CancelOrder\Controller\Order;

class Cancel extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Customer\Model\Session
     */
    private $customerSession;

    /**
     * @param \Magento\Sales\Model\Order
     */
    private $order;

    /**
     * @param \Magento\Sales\Model\ResourceModel\Order\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param \Magento\Sales\Api\OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Sales\Model\Order $order,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $collectionFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository
    ) {
        $this->_pageFactory = $pageFactory;
        $this->customerSession = $customerSession;
        $this->order = $order;
        $this->collectionFactory = $collectionFactory;
        $this->orderRepository = $orderRepository;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $orderId = $this->getRequest()->getParam('order_id',false);
        $dataOrder = $this->checkExitsId($orderId);
        if (!$dataOrder) {
            $this->messageManager->addError(__('This order is not exist'));
        } else {
            $order = $this->orderRepository->get($orderId);
            $checkIsYourOrder = $this->checkOrder($order);
            $checkStatusOrder = $this->checkStatus($order);
            try {
                if (!$checkIsYourOrder) {
                    $this->messageManager->addError(__('This order is not yours'));
                } elseif ($checkStatusOrder !== 'pending') {
                    $this->messageManager->addError(__("Your order has status '$checkStatusOrder'. You can not cancel this order"));
                } else {
                    $order->setStatus('canceled');
                    $order->save();
                    $this->messageManager->addSuccess(__('Cancel order successfully'));
                }
            } catch (\Exception $other) {
                $this->messageManager->addException($other, __('We can\'t cancel the order right now.'));
            }
        }
        return $this->resultRedirectFactory->create()->setPath('sales/order/history');
    }
    
    private function checkOrder($order)
    {
        $customerId = $this->customerSession->getCustomerId();
        $idCustomerOrder = $order->getCustomerId();
        if ($idCustomerOrder !== $customerId) {
            return false;
        }
        return true;
    }
    private function checkStatus($order)
    {
        $status = $order->getStatus();
        return $status;
    }
    private function checkExitsId($orderId){
        $collection = $this->collectionFactory->create()
        ->addAttributeToSelect('*')
        ->addFieldToFilter('entity_id', $orderId);
        $data = $collection->getData();
        return $data;
    }
}
