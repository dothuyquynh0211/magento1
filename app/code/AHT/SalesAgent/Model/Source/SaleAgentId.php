<?php
namespace AHT\SalesAgent\Model\Source;

class SaleAgentId extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @param \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        
    }
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '', 'label' => __('Please Select')]
            ];
            $collection = $this->collectionFactory->create();
            $collection->addAttributeToFilter('is_sales_agent', array('eq' => 1));
            foreach ($collection as $key => $value) {
                $list = ['value' => $value->getData('entity_id') , 'label' => $value->getData('firstname').' '. $value->getData('lastname')];
                array_push($this->_options,$list);
            }            
        }
        return $this->_options;
    }
}
