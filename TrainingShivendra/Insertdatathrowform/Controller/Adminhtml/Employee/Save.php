<?php
namespace TrainingShivendra\Insertdatathrowform\Controller\Adminhtml\Employee;

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
        if (!empty($data['experiance'])) {
            $data['experiance'] = json_encode($data['experiance']);
        }
        if (empty($data['id'])) {
                $data['id'] = null;
            }
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                try {
                    $model = $this->crud->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This block no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }
        $save = $this->crud->setData($data)->save();
        if($save) {
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        } else {
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
       return $this->resultRedirectFactory->create()->setPath('*/*/');


    }
}
