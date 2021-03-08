<?php

namespace TrainingShivendra\Insertdatathrowform\Controller\Adminhtml\Employee;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        //echo "ssss";
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('User Data')));
        $dataPersistor = $this->_objectManager->get(\Magento\Framework\App\Request\DataPersistorInterface::class);
        //$dataPersistor->clear('insertdatathrowform_employee');
        return $resultPage;
    }


}