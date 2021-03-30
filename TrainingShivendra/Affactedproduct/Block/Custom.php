<?php
namespace TrainingShivendra\Affactedproduct\Block;

class Custom extends \Magento\Backend\Block\Template {

protected $_scopeConfig;
protected $rule;
public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \magento\CatalogRule\Model\Rule $rule, \Magento\Backend\Block\Template\Context $context, \Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable $catalogProductTypeConfigurable, array $data = [])
{
	    $this->_scopeConfig = $scopeConfig;
	    $this->rule = $rule;
	    $this->_catalogProductTypeConfigurable = $catalogProductTypeConfigurable;
        parent::__construct($context, $data);
}

    public function afactedProduct(){
    // $getRuleId;//get catalog rule by scopeconfig
    $getProductLimit = 100; // get product limit by scopeconfig
    $results = $this->rule->load(4);
    $products = $results->getMatchingProductIds();
    $finalproducts = [];
    foreach ($products as $key=>$value){
        $parentByChild = $this->_catalogProductTypeConfigurable->getParentIdsByChild($key);
        if (isset($parentByChild[0]) && !in_array($parentByChild[0],$finalproducts)) {
            $finalproducts[] = $parentByChild[0];
        }
    }
    $output = array_slice($finalproducts, 0, $getProductLimit);
    return $output;
}
}
