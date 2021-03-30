<?php
/**
 * Code standard by : RH
 */
namespace TrainingShivendra\Insertdatathrowform\Model\ResourceModel;
use Magento\Framework\Data\OptionSourceInterface;
class CustOptions implements OptionSourceInterface
{
    protected $attributeOptionsList = [];
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $this->attributeOptionsList = [
            [
                'value' => "PHP",
                "label" => "PHP"
            ],[
                'value' => "Magento",
                "label" => "Magento"
            ],
        ];
        return $this->attributeOptionsList;
    }
}