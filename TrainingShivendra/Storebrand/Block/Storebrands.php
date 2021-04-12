<?php
namespace TrainingShivendra\Storebrand\Block;
use Magento\Catalog\Api\CategoryRepositoryInterface;
class Storebrands extends \Magento\Framework\View\Element\Template
{
    protected $request;
    protected $storebrand;
    protected $urlinter;
    protected $categoryRepository;
    protected $_productCollectionFactory;
    protected $_productRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Framework\App\Request\Http $request, 
        \TrainingShivendra\Storebrand\Model\Storebrand $Storebrand, 
        \Magento\Store\Model\StoreManagerInterface $storeinter, 
        \Magento\Catalog\Model\CategoryRepository $categoryRepository, 
        \Magento\Sales\Model\ResourceModel\Report\Bestsellers\CollectionFactory $collectionFactory, 
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
                \Magento\Catalog\Model\ProductRepository $productRepository,

    array $data = []
    )
    {
        $this->storebrand = $Storebrand;
        $this->request = $request;
        $this->urlinter = $storeinter;
        $this->categoryRepository = $categoryRepository;
        $this->_collectionFactory = $collectionFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
                $this->_productRepository = $productRepository;

        parent::__construct($context, $data);
    }
    public function getBrandCollection($brand)
    {
        $brandCollection = $this->storebrand->getCollection()->addFieldToFilter('url', $brand);
        return $brandCollection;
    }
    public function getMediaDirectoryUrl()
    {
        $media_dir = $this->urlinter->getStore()
        ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media_dir;
    }
    public  function getCategory($categoryId)
    {
        $category = $this->categoryRepository->get($categoryId, $this->_storeManager->getStore()->getId());
        return $category->getUrl();
    }
    public  function getCategoryName($categoryId)
    {
        $category = $this->categoryRepository->get($categoryId, $this->_storeManager->getStore()->getId());
        return $category->getName();
    }
    public function getProductCollectionByCategories($category_ids)
    {
        return $collection = $this->_collectionFactory->create()->setModel(
            'Magento\Catalog\Model\Product'
        )->join(['secondTable' => 'catalog_category_product'], 'sales_bestsellers_aggregated_yearly.product_id = secondTable.product_id', ['category_id' => 'secondTable.category_id'])
        ->addFieldToFilter('category_id', ['in' => $category_ids]);
    }

     public function getProductCollectionByproducts($category_ids)
    {
        $collection = $this->_productCollectionFactory->create();
                $collection->addAttributeToSelect('*');
        $collection->addIdFilter($category_ids);
        return $collection;
    }
public function getProductData($productId)
    {
        return $this->_productRepository->getById($productId);
    }
}