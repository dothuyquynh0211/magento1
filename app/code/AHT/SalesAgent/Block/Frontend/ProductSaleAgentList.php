<?php
namespace AHT\SalesAgent\Block\Frontend;

class ProductSaleAgentList extends \Magento\Framework\View\Element\Template
{

    /**
     * @param \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    private $collection;

    /**
     * @param \Magento\Customer\Model\Session
     */
    private $modelSessionFactory;

    protected $_template = 'AHT_SalesAgent::saleagentList.phtml';

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collection,
        \Magento\Customer\Model\SessionFactory $modelSessionFactory,
        array $data = []
    ) {
        $this->collection = $collection;
        $this->modelSessionFactory = $modelSessionFactory;
        parent::__construct($context, $data);
    }
    public function getProducts(){
        $collection = $this->collection->create()->addAttributeToSelect("*");
        $customerSession = $this->modelSessionFactory->create();        
        $customerId =  $customerSession->getId();
        $collection->addAttributeToFilter('sale_agent_id', array('eq' => $customerId));

        return $collection;
    }

    
}
