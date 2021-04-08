<?php
namespace TrainingShivendra\Stock\Controller\Adminhtml\Stock;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $stock;
    protected $_product;
    protected $stockItemRepository;
        protected $authSession;



  public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \TrainingShivendra\Stock\Model\Stock $stock,
        \Magento\Catalog\Model\Product $product,
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Backend\Model\Auth\Session $authSession

    )
    {
        $this->stock = $stock;
        $this->_product = $product;
        $this->stockItemRepository = $stockItemRepository;
                $this->authSession = $authSession;


        parent::__construct($context);
    }
    public function execute()
    {  
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        if (isset($data['qty'])  && isset($data['p_id'])) {
            $userdetail = $this->authSession->getUser();
            $data['updated_by'] = $userdetail->getUsername();
            $product=$this->_product->load($data['p_id']); //load product which you want to update stock
            $stockdetail = $this->stockItemRepository->get($data['p_id']);
            $data['prev_qty'] = $stockdetail->getQty();
            $product->setStockData(['qty' => $data['qty']]);
            $product->setQuantityAndStockStatus(['qty' => $data['qty']]);
            $product->save();
            $data['adjst_qty'] = $data['prev_qty'] - $data['qty'];
            $data['current_qty'] = $data['qty'];
            $data['p_sku'] = $product->getSku();
            $save = $this->stock->setData($data)->save();
            if($save) {
                $this->messageManager->addSuccessMessage(__('You saved the data.'));
            } else {
                $this->messageManager->addErrorMessage(__('Data was not saved.'));
            }
          } else {
            $this->messageManager->addErrorMessage(__('Please enter correct detail.'));
          }
        return $this->resultRedirectFactory->create()->setPath('*/*/');

    }
}
