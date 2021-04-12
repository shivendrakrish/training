<?php
namespace TrainingShivendra\Storebrand\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\View\LayoutFactory;
class Grids extends \Magento\Backend\App\Action
{
    public function __construct(
        Context $context,
        Rawfactory $resultRawFactory,
        LayoutFactory $layoutFactory
    ) {
        parent::__construct($context);
        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;
    }
    public function execute()
    {
        $resultRaw = $this->resultRawFactory->create();
        return $resultRaw->setContents(
            $this->layoutFactory->create()->createBlock(
                'TrainingShivendra\Storebrand\Block\Adminhtml\Tab\Productgrid',
                'trainingshivendra.custom.tab.productgrid'
            )->toHtml()
        );
    }
}
