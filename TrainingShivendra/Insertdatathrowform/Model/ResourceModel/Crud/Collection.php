<?php

namespace TrainingShivendra\Insertdatathrowform\Model\ResourceModel\Crud;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Insertdatathrowform\Model\Crud', 'TrainingShivendra\Insertdatathrowform\Model\ResourceModel\Crud');
    }

}
?>
