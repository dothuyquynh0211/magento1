<?php

namespace AHT\SalesAgent\Observer;

class InsertSaleAgent implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @param \AHT\SalesAgent\Model\SaleAgentFactory
     */
    private $saleAgentFactory;

    /**
     * @param \AHT\SalesAgent\Model\SaleAgentRepository
     */
    private $saleAgentRepository;

    public function __construct(
        \AHT\SalesAgent\Model\SaleAgentFactory $saleAgentFactory,
        \AHT\SalesAgent\Model\SaleAgentRepository $saleAgentRepository
    ) {
        $this->saleAgentFactory = $saleAgentFactory;
        $this->saleAgentRepository = $saleAgentRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getData('order');
        $orderId = $order->getRealOrderId();
        $orderItems = $order->getItemsCollection();

        foreach ($orderItems as $key => $orderItem) {
            if (!$orderItem->isDeleted() && $orderItem->getParentItemId() && $orderItem->getProduct()->getData('sale_agent_id') != NULL && $orderItem->getProduct()->getData('sale_agent_id') != '') {


                $orderItemId = $orderItem->getItemId();
                $products = $orderItem->getProduct();
                $sku = $products->getSku();
                $price = $products->getPrice();
                $commissionType = $products->getData('commission_type');
                $commissionValue = $products->getData('commission_value');

                $saleAgent = $this->saleAgentFactory->create();
                $saleAgent->setOrderId($orderId);
                $saleAgent->setOrderItemId($orderItemId);
                $saleAgent->setOrderItemSku($sku);
                $saleAgent->setOrderItemPrice($price);
                $saleAgent->setCommissionType($commissionType);
                $saleAgent->setCommissionValue($commissionValue);
                $this->saleAgentRepository->save($saleAgent);
            }
        }
    }
}
