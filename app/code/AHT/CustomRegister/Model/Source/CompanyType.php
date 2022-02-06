<?php
namespace AHT\CustomRegister\Model\Source;

class CompanyType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '', 'label' => __('Please Select')],
                ['value' => 'M', 'label' => __('CBD Manufacturer')],
                ['value' => 'B', 'label' => __('CBD Brand and Marketing company')],
                ['value' => 'E', 'label' => __('CBD Extractor')],
                ['value' => 'O', 'label' => __('Other')]
            ];
        }
        return $this->_options;
    }
}