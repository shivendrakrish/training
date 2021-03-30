<?php
namespace TrainingShivendra\Customeriprestriction\Model;

class Ip extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TrainingShivendra\Customeriprestriction\Model\ResourceModel\Ip');
    }
}
?>
