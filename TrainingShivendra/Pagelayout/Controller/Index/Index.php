<?php 
namespace TrainingShivendra\Pagelayout\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action {
protected $resultPageFactory = false;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Display block in three column')));

        return $resultPage;
    }
}
 ?>

