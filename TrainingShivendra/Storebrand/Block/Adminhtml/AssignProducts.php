<?php
namespace TrainingShivendra\Storebrand\Block\Adminhtml;
class AssignProducts extends \Magento\Backend\Block\Template
{

    protected $_template = 'products/assign_products.phtml';
   
    protected $blockGrid;
 
    protected $registry;
 
    protected $jsonEncoder;
  
    protected $productFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \TrainingShivendra\Storebrand\Model\ResourceModel\Storebrand\CollectionFactory $productFactory,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->jsonEncoder = $jsonEncoder;
        $this->productFactory = $productFactory;
        parent::__construct($context, $data);
    }
    /**
     * Retrieve instance of grid block
     *
     * @return \Magento\Framework\View\Element\BlockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBlockGrid()
    {
        if (null === $this->blockGrid) {
            $this->blockGrid = $this->getLayout()->createBlock(
                'TrainingShivendra\Storebrand\Block\Adminhtml\Tab\Productgrid',
                'category.product.grid'
            );
        }
        return $this->blockGrid;
    }
    /**
     * Return HTML of grid block
     *
     * @return string
     */
    public function getGridHtml()
    {
        return $this->getBlockGrid()->toHtml();
    }
    /**
     * @return string
     */
    public function getProductsJson()
    {
        $entity_id = $this->getRequest()->getParam('entity_id');
        $productFactory = $this->productFactory->create();
        $productFactory->addFieldToSelect(['product_id', 'position']);
        $productFactory->addFieldToFilter('entity_id', ['eq' => $entity_id]);
        $result = [];
        if (!empty($productFactory->getData())) {
            foreach ($productFactory->getData() as $rhProducts) {
                $result[$rhProducts['product_id']] = '';
            }
            return $this->jsonEncoder->encode($result);
        }
        return '{}';
    }
    public function getItem()
    {
        return $this->registry->registry('my_item');
    }
}
