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
        $date = $this->date->gmtDate('Y-m-d H:i:s a');
        $date = new \DateTime($date.' +00'); 
        $date->setTimezone(new \DateTimeZone('Asia/Kolkata')); 
        return $date->format('Y-m-d H:i:s a');
    }
    public function getCurrentdate()
    {
        return $date = $this->date->gmtDate('Y-m-d');
    }
}