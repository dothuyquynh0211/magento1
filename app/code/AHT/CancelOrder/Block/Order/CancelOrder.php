<?php
namespace AHT\CancelOrder\Block\Order;

class CancelOrder extends \Magento\Sales\Block\Order\History
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected $_template = 'AHT_CancelOrder::order/history.phtml';
    /**
     * @var \Magento\Sales\Model\ResourceModel\Order\CollectionFactory
     */
    protected $_orderCollectionFactory;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * @var \Magento\Sales\Model\Order\Config
     */
    protected $_orderConfig;

    public function __construct(        
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Sales\Model\Order\Config $orderConfig,
        array $data = []
    ) {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->_customerSession = $customerSession;
        $this->_orderConfig = $orderConfig;
        parent::__construct($context, $orderCollectionFactory, $customerSession, $orderConfig, $data);
    }
    /**
     * Get order view URL
     *
     * @param object $order
     * @return string
     */
    public function getCancelUrl($order)
    {
        return $this->getUrl('cancelorder/order/cancel', ['order_id' => $order->getId()]);
    }
}
