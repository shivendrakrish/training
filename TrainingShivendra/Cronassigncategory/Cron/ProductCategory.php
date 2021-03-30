<?php
namespace TrainingShivendra\Cronassigncategory\Cron;

class ProductCategory
{
    public function execute()
    {
        $first = date("Y-m-d h:i:s", strtotime("-4 days")); // start date
        $last = date("Y-m-d h:i:s"); // end date

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $CategoryLinkRepository = $objectManager->get('\Magento\Catalog\Api\CategoryLinkManagementInterface');
        $productCollectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $collection = $productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToFilter('created_at', array(
        'from' => $first,
        'to' => $last,
        'date' => true,
        ));
        $collection->addAttributeToSort('entity_id','desc');
        $collection->setPageSize(10); // selecting only 10 products
        foreach ($collection as $product) {
        $category_ids = array('4', '6');
                $CategoryLinkRepository->assignProductToCategories($product->getSku(), $category_ids);
        }        
    }
}
