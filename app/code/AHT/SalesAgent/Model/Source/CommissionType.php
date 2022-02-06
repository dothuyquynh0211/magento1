<?php

namespace AHT\SalesAgent\Model\Source;

class CommissionType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '', 'label' => __('Please Select')],
                ['value' => 'F', 'label' => __('Fixed')],
                ['value' => 'P', 'label' => __('Percent')]
            ];
        }
        return $this->_options;
    }
}
