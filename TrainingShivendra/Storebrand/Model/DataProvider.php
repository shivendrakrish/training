<?php
namespace TrainingShivendra\Storebrand\Model;
use TrainingShivendra\Storebrand\Model\ResourceModel\Storebrand\CollectionFactory;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Customer $customer */
        foreach ($items as $store) {
            $this->loadedData[$store->getId()]['storebrandlist'] = $store->getData();
        }
        return $this->loadedData;

    }
}
