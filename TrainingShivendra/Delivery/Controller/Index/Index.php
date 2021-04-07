<?php
namespace TrainingShivendra\Delivery\Controller\Index;
 
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Catalog\Model\Product;

 
 
class Index extends Action
{
 
  
    protected $_resultPageFactory;
    protected $date; 
 
    public function __construct(Context $context, PageFactory $resultPageFactory, \Magento\Framework\Stdlib\DateTime\DateTime $date)
    {
 
        $this->_resultPageFactory = $resultPageFactory;
        $this->date = $date;
 
        parent::__construct($context);
    }
 
    public function execute()
    {
        $date = $this->date->gmtDate('Y-m-d H:i:s a');
        $date = new \DateTime($date.' +00'); 
        $date->setTimezone(new \DateTimeZone('Asia/Kolkata')); 
        $date->format('Y-m-d H:i:s a');
        $samedatdeliverytime = $this->date->gmtDate('Y-m-d').' 20:00:00 pm';
        $month = date("m"); //month
        $nextday = date("d", strtotime("+1 days")); // start date
        $monthname = date("F", mktime(0, 0, 0, $month, 10));

        if ($date < $samedatdeliverytime) {
          echo "Order Today and Receive it by Today";
        }
        if ($date > $samedatdeliverytime) {
          echo  "Order Today and Receive it by tomorrow ".$monthname.", ". $nextday;

        } 

    }
    
 
}