<?php
namespace TrainingShivendra\Storebrand\Block;
class Home extends \Magento\Framework\View\Element\Template
{
	protected $request;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Framework\App\Request\Http $request, \TrainingShivendra\Storebrand\Model\Storebrand $storebrand
)
	{
		parent::__construct($context);
		$this->storebrand = $storebrand;
		$this->request = $request;
	}
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    public function getstoreCollection()
	    {
	        $userId = $this->request->getParam('id');
	        
        return $this->storebrand->getCollection('6');
      		
	    }
}