<?php
namespace TrainingShivendra\Product\Model;

use TrainingShivendra\Product\Api\ProductUpdateManagementInterface as ProductApiInterface;

class ProductUpdateManagement implements ProductApiInterface {

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->productRepository = $productRepository;
        $this->logger = $logger;
    }

    public function updateProduct() {
        // if (!empty($products)) {
        	$error = false;
        		try {
        			//$sku = $product['sku'];
        	       	$productObject = $this->productRepository->get('WSH12-28-Green');
        	       	// $qty = $product['qty'];
        	       	// $price = $product['price'];
        	       	//$productObject->setPrice('60');
        	       	$productObject->setStockData(
        	       		[
				      'is_in_stock' => 1,
				      'qty' => 2
				]
			);
        	try {
			            $this->productRepository->save($productObject);
			        } catch (\Exception $e) {
			            throw new StateException(__('Cannot save product.'));
			        }
				} catch (\Magento\Framework\Exception\LocalizedException $e) {
	                $messages[] = $product['sku'].' =>'.$e->getMessage();
	                $error = true;
	            }
            if ($error) {
	            $this->writeLog(implode(" || ",$messages));
	            return false;
	        }
        // }
        return true;
    }

    /* log for an API */
    public function writeLog($log)
    {
        $this->logger->info($log);
    }
}