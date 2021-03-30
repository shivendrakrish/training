<?php

namespace TrainingShivendra\Insertdatathrowform\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
  protected $crud;
  public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \TrainingShivendra\Insertdatathrowform\Model\Crud $crud
        
    )
    {
        $this->crud = $crud;
        parent::__construct($context);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
        $save = $this->crud->setData($data)->save();
        if($save) {
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        } else {
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        // $resultRedirect = $this->resultRedirectFactory->create();
        // $resultRedirect->setPath('Insertdatathrowform/index/index');
        return $this->resultRedirectFactory->create()->setPath('insertdatathrowform/index/index');

    }
}
