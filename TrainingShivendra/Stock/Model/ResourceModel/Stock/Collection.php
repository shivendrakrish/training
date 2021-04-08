<?php

namespace TrainingShivendra\Stock\Model\ResourceModel\Stock;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Stock\Model\Stock', 'TrainingShivendra\Stock\Model\ResourceModel\Stock');
    }

}
?>
