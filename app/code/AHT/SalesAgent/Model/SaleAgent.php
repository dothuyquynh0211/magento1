<?php
namespace AHT\SalesAgent\Model;

class SaleAgent extends \Magento\Framework\Model\AbstractModel 
implements \Magento\Framework\DataObject\IdentityInterface, 
\AHT\SalesAgent\Api\Data\SaleAgentInterface

{
    const CACHE_TAG = 'aht_salesagent_sale_agent';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'sale_agent';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\SalesAgent\Model\ResourceModel\SaleAgent');
    }

    /**
     * Return a unique id for the model.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    /**
     * Set entity id
     *
     * @param string $entityId
     * @return SaleAgentInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }
    /**
     * Retrieve block $entityId
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set entity id
     *
     * @param string $entityId
     * @return SaleAgentInterface
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }
    /**
     * Retrieve block $entityId
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * Set entity id
     *
     * @param string $entityId
     * @return SaleAgentInterface
     */
    public function setOrderItemId($orderItemId)
    {
        return $this->setData(self::ORDER_ITEM_ID, $orderItemId);
    }
    /**
     * Retrieve block $orderItemSku
     *
     * @return string
     */
    public function getOrderItemId()
    {
        return $this->getData(self::ORDER_ITEM_ID);
    }
    /**
     * Retrieve block $orderItemSku
     *
     * @return string
     */
    public function getOrderItemSku()
    {
        return $this->getData(self::ORDER_ITEM_SKU);
    }

    /**
     * Set order item sku
     *
     * @param string $orderItemSku
     * @return SaleAgentInterface
     */
    public function setOrderItemSku($orderItemSku)
    {
        return $this->setData(self::ORDER_ITEM_SKU, $orderItemSku);
    }
    /**
     * Retrieve block $orderItemPrice
     *
     * @return string
     */
    public function getOrderItemPrice()
    {
        return $this->getData(self::ORDER_ITEM_PRICE);
    }

    /**
     * Set order item price
     *
     * @param string $orderItemPrice
     * @return SaleAgentInterface
     */
    public function setOrderItemPrice($orderItemPrice)
    {
        return $this->setData(self::ORDER_ITEM_PRICE, $orderItemPrice);
    }
    /**
     * Set commission type
     *
     * @param string $commissionType
     * @return SaleAgentInterface
     */
    public function setCommissionType($commissionType)
    {
        return $this->setData(self::COMMISSION_TYPE, $commissionType);
    }
    /**
     * Retrieve block $commissionType
     *
     * @return string
     */
    public function getCommissionType()
    {
        return $this->getData(self::COMMISSION_TYPE);
    }
    /**
     * Retrieve block $commissionValue
     *
     * @return string
     */
    public function getCommissionValue()
    {
        return $this->getData(self::COMMISSION_VALUE);
    }

    /**
     * Set commission value
     *
     * @param string $commissionValue
     * @return SaleAgentInterface
     */
    public function setCommissionValue($commissionValue)
    {
        return $this->setData(self::COMMISSION_VALUE, $commissionValue);
    }
    
}
