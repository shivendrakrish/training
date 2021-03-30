<?php
namespace TrainingShivendra\Customeriprestriction\Observer;                        

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerRegister implements ObserverInterface
{
	protected $_ipFactory;
	public function __construct(
	\TrainingShivendra\Customeriprestriction\Model\IpFactory $ipFactory
	)
	{
		$this->_ipFactory = $ipFactory;
	}

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	    //ip from share internet
	    $ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	    //ip pass from proxy
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
	    $ip = $_SERVER['REMOTE_ADDR'];
	}
		$blockip = $this->_ipFactory->create();
		$collection = $blockip->getCollection();
		foreach($collection as $item) {
			if ($item->getData('ip') == $ip) {
				echo "You Can not register";
			}
		}
		exit();

    }
}

