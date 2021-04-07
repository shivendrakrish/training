<?php
namespace TrainingShivendra\Delivery\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Custom extends Action
{
   
    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct(
            $context
        );
    }
    public function execute()
    {
       $resultPage = $this->_resultPageFactory->create();
       $resultPage->addHandle('catalog_product_view'); //loads the layout of catalog_product_view.xml file with its name
       return $resultPage;
    }
}