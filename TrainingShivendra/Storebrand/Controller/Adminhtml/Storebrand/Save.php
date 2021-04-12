<?php
namespace TrainingShivendra\Storebrand\Controller\Adminhtml\Storebrand;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $storebrand;
    protected $_product;
    protected $authSession;
    protected $jsonHelper;


  public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \TrainingShivendra\Storebrand\Model\Storebrand $Storebrand,
        \Magento\Catalog\Model\Product $product,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\Json\Helper\Data $jsonHelper
    )
    {
        $this->storebrand = $Storebrand;
        $this->_product = $product;
        $this->authSession = $authSession;
        $this->jsonHelper = $jsonHelper;

        parent::__construct($context);
    }
    public function execute()
    {  
     try {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        // print_r($data);
        // exit();
        if (isset($data['image'])) {
               $bannerurl = [];
          foreach($data['image'] as $item){
            array_push($bannerurl,$item['url']);
          }
            $data['banner'] = $this->jsonHelper->jsonEncode($bannerurl);
        }
        if (isset($data['cat_id'])) {
            $data['cat_id'] = $this->jsonHelper->jsonEncode($data['cat_id']);
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
