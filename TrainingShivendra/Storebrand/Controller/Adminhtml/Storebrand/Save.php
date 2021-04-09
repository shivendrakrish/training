<?php
namespace TrainingShivendra\Storebrand\Controller\Adminhtml\Storebrand;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $storebrand;
    protected $_product;
    protected $authSession;

  public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \TrainingShivendra\Storebrand\Model\Storebrand $Storebrand,
        \Magento\Catalog\Model\Product $product,
        \Magento\Backend\Model\Auth\Session $authSession
    )
    {
        $this->storebrand = $Storebrand;
        $this->_product = $product;
        $this->authSession = $authSession;
        parent::__construct($context);
    }
    public function execute()
    {  
     try {
        $resultRedirect = $this->resultRedirectFactory->create();
                $data = $this->getRequest()->getParams();

        if (isset($data['image'])) {
        $data['banner'] = json_encode($data['image']);
        }
        if (isset($data['cat_id'])) {
        $data['cat_id'] = json_encode($data['cat_id']);
        }
        if (isset($data['ourproduct'])) {
        $data['ourproduct'] = json_encode($data['ourproduct']);
        }
            $save = $this->storebrand->setData($data)->save();
            if($save) {
                $this->messageManager->addSuccessMessage(__('Store brand detail saved successfully.'));
            } else {
                $this->messageManager->addErrorMessage(__('Failed to save store brand detail.'));
            }
            
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
        }
        return $this->resultRedirectFactory->create()->setPath('*/*/');

    }
}
