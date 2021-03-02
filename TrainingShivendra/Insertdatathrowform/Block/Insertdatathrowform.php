<?php
namespace TrainingShivendra\Insertdatathrowform\Block;
class Insertdatathrowform extends \Magento\Framework\View\Element\Template
{
	protected $request;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Framework\App\Request\Http $request, \TrainingShivendra\Insertdatathrowform\Model\Crud $crud
)
	{
		parent::__construct($context);
		$this->crud = $crud;
		$this->request = $request;
	}
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    public function getuserCollection()
	    {
	        //$crud = $this->crud->create();
	        $id = $this->request->getParam('id');
	        $collection = $this->crud->getCollection($id);
      
	        //return $collection;
	    }
}