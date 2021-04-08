<?php
namespace TrainingShivendra\Delivery\Controller\Index;
 
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

 
 
class Index extends Action
{
 
  
    protected $_resultPageFactory;
    protected $date; 
    protected $resultJsonFactory; 
    public function __construct(Context $context, PageFactory $resultPageFactory, \Magento\Framework\Stdlib\DateTime\DateTime $date, JsonFactory $resultJsonFactory)
    {
 
        $this->_resultPageFactory = $resultPageFactory;
        $this->date = $date;
                $this->resultJsonFactory = $resultJsonFactory; 
 
        parent::__construct($context);
    }
 
    public function execute()
    {
 		try {
	    	$result = $this->resultJsonFactory->create();
	        $resultPage = $this->_resultPageFactory->create();
	        $date = $this->date->gmtDate('Y-m-d H:i:s a');
	        $date = new \DateTime($date.' +00'); 
	        $date->setTimezone(new \DateTimeZone('Asia/Kolkata')); 
	        $date->format('Y-m-d H:i:s a');
	        $samedatdeliverytime = $this->date->gmtDate('Y-m-d').' 10:00:00 pm';
	        $month = date("m"); //month
	        $nextday = date("d", strtotime("+1 days")); // start date
	        $monthname = date("F", mktime(0, 0, 0, $month, 10));
	        $msg = '';
	        if ($date > $samedatdeliverytime) {
	          $msg = "Order Today and Receive it by Today";
	        }
	        if ($date < $samedatdeliverytime) {
	          $msg =  "Order Today and Receive it by tomorrow ".$monthname.", ". $nextday;

	        } 
	        $result->setData(['output' => $msg]);
	        return $result;
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
        }

    }

    
 
}
