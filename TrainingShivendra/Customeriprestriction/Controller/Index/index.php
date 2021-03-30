<?php
namespace TrainingShivendra\Customeriprestriction\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_ipFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\TrainingShivendra\Customeriprestriction\Model\IpFactory $ipFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_ipFactory = $ipFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$ip = $this->_ipFactory->create();
		$collection = $ip->getCollection();
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();
		return $this->_pageFactory->create();
	}
}