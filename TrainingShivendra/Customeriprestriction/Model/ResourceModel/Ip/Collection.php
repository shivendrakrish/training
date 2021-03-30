<?php

namespace TrainingShivendra\Customeriprestriction\Model\ResourceModel\Ip;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Customeriprestriction\Model\Ip', 'TrainingShivendra\Customeriprestriction\Model\ResourceModel\Ip');
    }

}
?>
