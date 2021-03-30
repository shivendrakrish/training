<?php
namespace TrainingShivendra\Customeriprestriction\Model\ResourceModel;

class Ip extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('restricted_ip', 'ip_id');
    }
}
?>
