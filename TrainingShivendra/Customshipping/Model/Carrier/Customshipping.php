<?php
namespace TrainingShivendra\Customshipping\Model\Carrier;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Shipping\Model\Config;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Store\Model\ScopeInterface;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Psr\Log\LoggerInterface;

class Customshipping extends AbstractCarrier implements CarrierInterface
{

protected $_code = 'trainingshivendra_customshipping';
protected $_isFixed = true;
protected $_rateResultFactory;
protected $_rateMethodFactory;

public function __construct(
ScopeConfigInterface $scopeConfig,
ErrorFactory $rateErrorFactory,
LoggerInterface $logger,
ResultFactory $rateResultFactory,
MethodFactory $rateMethodFactory,
array $data = []
) {

$this->_rateResultFactory = $rateResultFactory;
$this->_rateMethodFactory = $rateMethodFactory;
parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
}

public function getAllowedMethods()
{
return [$this->getCarrierCode() => __($this->getConfigData('name'))];
}


public function collectRates(RateRequest $request)
{

if (!$this->isActive()) {
return false;
}

$result = $this->_rateResultFactory->create();
$shippingPrice = $this->getConfigData('price');
$method = $this->_rateMethodFactory->create();

$method->setCarrier($this->getCarrierCode());
$method->setCarrierTitle($this->getConfigData('title'));

$method->setMethod($this->getCarrierCode());
$method->setMethodTitle($this->getConfigData('name'));
$method->setPrice($shippingPrice);
$method->setCost($shippingPrice);
$result->append($method);
return $result;
}
}