<?php

namespace TrainingShivendra\Storebrand\Model\ResourceModel\Storebrand;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Storebrand\Model\Storebrand', 'TrainingShivendra\Storebrand\Model\ResourceModel\Storebrand');
    }

}
?>
