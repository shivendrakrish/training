<?php
namespace TrainingShivendra\AdditionalFee\Controller\Index;

class Config extends \Magento\Framework\App\Action\Action
{

	protected $helperData;
	protected $storeManager;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\TrainingShivendra\AdditionalFee\Helper\Data $helperData,
		\Magento\Store\Model\StoreManagerInterface $storeManager
	)
	{
		$this->_storeManager = $storeManager;        
		$this->helperData = $helperData;
		return parent::__construct($context);
	}

	public function execute()
	{

		// TODO: Implement execute() method.
		//echo $this->helperData->getGeneralConfig('enable', $this->_storeManager->getStore()->getId());
		echo $this->helperData->getGeneralConfig('display_text', $this->_storeManager->getStore()->getId());
		exit();

	}
}