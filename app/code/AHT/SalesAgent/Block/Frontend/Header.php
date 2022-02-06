<?php
namespace AHT\SalesAgent\Block\Frontend;

class Header extends \Magento\Theme\Block\Html\Header

{
    protected $_template = 'AHT_SalesAgent::html/header.phtml';
    /**
     * @param \Magento\Customer\Model\SessionFactory
     */
    private $customerSessionFactory;

    public function __construct(
        \Magento\Customer\Model\SessionFactory $customerSessionFactory,
        \Magento\Framework\View\Element\Template\Context $context, array $data = []

    )
    {
        parent::__construct($context, $data);
        $this->customerSessionFactory = $customerSessionFactory;
        
    }

    public function getNameSalesAgent()
    {
        $customerSession = $this->customerSessionFactory->create();
        $sessionId =$customerSession->getCustomer();

        $customerSaleAgent = $sessionId->getData('is_sales_agent');
        return $customerSaleAgent;
        
    }
}
