<?php
namespace TrainingShivendra\Storebrand\Model;

class Storebrand extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Storebrand\Model\ResourceModel\Storebrand');
    }
}
?>
