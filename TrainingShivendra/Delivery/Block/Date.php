<?php
namespace TrainingShivendra\Delivery\Block;

class Date extends \Magento\Framework\View\Element\Template
{
    protected $date; 
    public function __construct(\Magento\Framework\Stdlib\DateTime\DateTime $date) { 
        $this->date = $date;
        }
  
    public function getcurrentdatetime()
    {
        return $date = $this->date->gmtDate('Y-m-d H:i:s a');
    }
    public function getCurrentdate()
    {
        return $date = $this->date->gmtDate('Y-m-d');

    }
}