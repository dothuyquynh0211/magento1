<?php
namespace AHT\SalesAgent\Controller\Adminhtml\Report;

class Test extends \Magento\Framework\App\Action\Action
{
     /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \AHT\SalesAgent\Model\ResourceModel\SaleAgent\Grid\Collection
     */
    private $collection;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\SalesAgent\Model\ResourceModel\SaleAgent\CollectionFactory $collection
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->collection = $collection;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
      
      $collection = $this->collection->create();

      echo $collection->getSelect()->__toString();

      echo "</br>";
      echo "<pre>";
      print_r($collection->getData());

      die;
    }
}
