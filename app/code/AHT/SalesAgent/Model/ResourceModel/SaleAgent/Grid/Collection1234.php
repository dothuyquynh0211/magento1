<?php

namespace AHT\SalesAgent\Model\ResourceModel\SaleAgent\Grid;

class Collection1234 extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    protected function _initSelect()
    {
        parent::_initSelect();
        //Get Object Manager Instance
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        //Load product by product id
        $this->obj = $objectManager->create('\Magento\Eav\Model\ResourceModel\Entity\Attribute');
        $this->getSelect()
            ->join('sales_order_item as items', 'main_table.order_item_id = items.item_id', array('items.name', 'main_table.order_item_sku'))
            ->join('sales_order as order', 'items.order_id = order.entity_id', array(''))
            ->join('catalog_product_entity as product_sku', 'main_table.order_item_sku = product_sku.sku', array(''))
            ->join('catalog_product_entity_int as product', "product_sku.entity_id = product.entity_id and product.attribute_id = {$this->getProductAttrIdByCode('sale_agent_id')}", array(''))
            ->join('customer_entity as customer', 'product.value = customer.entity_id', array('customer.email'));

        //echo $this->getSelect()->__toString(); die;
        return $this;
    }

    public function getProductAttrIdByCode($attr_code)
    {
        return $this->obj->getIdByCode('catalog_product', $attr_code);
    }
}
