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
     try {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        $is_qtyint = ctype_digit((string)$data['qty']);
        $is_pidint = ctype_digit((string)$data['p_id']);
        if ($is_qtyint == true  && $is_pidint == true) {
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
                $this->messageManager->addSuccessMessage(__('Product stock updated successfully.'));
            } else {
                $this->messageManager->addErrorMessage(__('Failed to save stock.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Please enter correct detail.'));
          }
            
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
        }
        return $this->resultRedirectFactory->create()->setPath('*/*/');

    }
}
