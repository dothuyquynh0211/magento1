<?php
namespace AHT\SalesAgent\Controller\Adminhtml\Report\Test;

/**
 * Interceptor class for @see \AHT\SalesAgent\Controller\Adminhtml\Report\Test
 */
class Interceptor extends \AHT\SalesAgent\Controller\Adminhtml\Report\Test implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory, \AHT\SalesAgent\Model\ResourceModel\SaleAgent\CollectionFactory $collection)
    {
        $this->___init();
        parent::__construct($context, $pageFactory, $collection);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
