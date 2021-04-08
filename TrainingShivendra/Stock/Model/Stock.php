<?php
namespace TrainingShivendra\Stock\Model;

class Stock extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Stock\Model\ResourceModel\Stock');
    }
}
?>
