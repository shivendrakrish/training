<?php
namespace TrainingShivendra\Insertdatathrowform\Model\ResourceModel;

class Crud extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('trainingtest', 'id');
    }
}
?>
