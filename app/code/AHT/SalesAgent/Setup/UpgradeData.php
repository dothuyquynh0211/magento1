<?php
namespace AHT\SalesAgent\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * @param \Magento\Customer\Setup\CustomerSetupFactory
     */
    private $customerSetupFactory;

    public function __construct(
        \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        if (version_compare($context->getVersion(), '1.0.7') < 0) {
 
            $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY,
             'is_sales_agent', [
                'type' => 'int',
                'label' => 'Is sales agent',
                'input' => 'boolean',

                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'required' => false,
                'visible' => true,
                'position' => 333,
                'system' => false,
                'backend' => '',
                'is_used_in_grid' => 1,
                'is_visible_in_grid' => 1
            ]);
 
            $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'is_sales_agent')
                ->addData(['used_in_forms' => [
                    'adminhtml_customer',
                    'adminhtml_checkout',
                    'customer_account_create',
                    'customer_account_edit'
                ]
                ]);
            $attribute->save();
        }
        $setup->endSetup();
    }
}