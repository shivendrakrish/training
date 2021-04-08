<?php
namespace TrainingShivendra\Stock\Ui\Component\Listing\Grid\Column;
    use \Magento\Catalog\Api\ProductRepositoryInterface;
    use\Magento\Framework\View\Element\UiComponent\ContextInterface;
    use \Magento\Framework\View\Element\UiComponentFactory;
    use \Magento\Ui\Component\Listing\Columns\Column;
    use \Magento\Framework\UrlInterface;
    class Action extends Column
   {
        private $urlBuilder;
        const PRODUCT_URL_PATH_EDIT = 'catalog/product/edit';
        protected $_ProductRepository;
        public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        ProductRepositoryInterface $ProductRepository,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [])
        {
            $this->_ProductRepository = $ProductRepository;
            $this->urlBuilder = $urlBuilder;
            parent::__construct($context, $uiComponentFactory, $components, 
            $data);
        }
        public function prepareDataSource(array $dataSource)
        {
            if (isset($dataSource['data']['items'])) {
                foreach ($dataSource['data']['items'] as $key => $items) {
                    $product = $this->_ProductRepository->getById($items["p_id"]);
                    $dataSource['data']['items'][$key]['p_id'] = html_entity_decode('<a href="'.$this->urlBuilder->getUrl(self::PRODUCT_URL_PATH_EDIT, ['id' => $product->getId()]).'">'.$product->getName().'</a>');
                }
            }
            return $dataSource;
        }
    }

