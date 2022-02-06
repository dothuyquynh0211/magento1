<?php
namespace AHT\SalesAgent\Api\Data;

interface SaleAgentInterface
{
    public const ENTITY_ID ='entity_id';
    public const ORDER_ID = 'order_id';
    public const ORDER_ITEM_ID = 'order_item_id';
    public const ORDER_ITEM_SKU = 'order_item_sku';
    public const ORDER_ITEM_PRICE = 'order_item_price';
    public const COMMISSION_TYPE = 'commission_type';
    public const COMMISSION_VALUE = 'commission_value';

    /**
     * Get testSaleAgent entity_id
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Set testSaleAgent entity_id
     *
     * @param int $id
     * @return @this
     */
    public function setEntityId($id);

    /**
     * Get testSaleAgent order_id
     *
     * @return int|null
     */
    public function getOrderId();

    /**
     * Set testSaleAgent order_id
     *
     * @param int $id
     * @return @this
     */
    public function setOrderId($id);

    /**
     * Get testSaleAgent order_item_id
     *
     * @return int|null
     */
    public function getOrderItemId();

    /**
     * Set testSaleAgent order_item_id
     * @param int $id
     * @return @this
     */
    public function setOrderItemId($id);

    /**
     * Get testSaleAgent order_item_sku
     *
     * @return int|null
     */
    public function getOrderItemSku();

    /**
     * Set testSaleAgent order_item_sku
     *
     * @param int $id
     * @return @this
     */
    public function setOrderItemSku($id);

    /**
     * Get testSaleAgent order_item_price
     *
     * @return int|null
     */
    public function getOrderItemPrice();

    /**
     * Set testSaleAgent order_item_price
     *
     * @param int $id
     * @return @this
     */
    public function setOrderItemPrice($id);

    /**
     * Get testSaleAgent commission_type
     *
     * @return int|null
     */
    public function getCommissionType();

    /**
     * Set testSaleAgent commission_type
     *
     * @param int $id
     * @return @this
     */
    public function setCommissionType($id);

    /**
     * Get testSaleAgent commission_value
     *
     * @return int|null
     */
    public function getCommissionValue();

    /**
     * Set testSaleAgent commission_value
     *
     * @param int $id
     * @return @this
     */
    public function setCommissionValue($id);
}
