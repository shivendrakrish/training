<?php

namespace TrainingShivendra\Customeriprestriction\Controller\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use TrainingShivendra\Customeriprestriction\Observer\CheckUserCreateObserver;
/**
 * Class Index
 */
class Index extends Action
{
/**
 * ResultPageFactory
 * @var PageFactory
 */
public $resultPageFactory;

public $observer;

/**
 * Index constructor.
 * @param Context $context
 * @param PageFactory $resultPageFactory
 */
public function __construct(
    Context $context,
    PageFactory $resultPageFactory,
    CheckUserCreateObserver $observer
) {
    parent::__construct($context);
    $this->resultPageFactory = $resultPageFactory;
    $this->observer = $observer;
}

/**
 * @return \Magento\Backend\Model\View\Result\Page
 */
public function execute()
{
    echo "dsdfwdf";
    // $resultPage = $this->resultPageFactory->create();
    // $order = null;
    // $itemIds = null;

    // $this->observer->abc($order, $itemIds);
    // return $resultPage;
    }

}
