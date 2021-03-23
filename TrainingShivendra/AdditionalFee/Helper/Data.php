<?php

namespace TrainingShivendra\AdditionalFee\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

	const XML_CONFIG_ADDITIONALFEE = 'additionalfee/';

	public function getConfigValue($field, $storeId = null)
	{
		// return $this->scopeConfig->getValue(
		// 	$field, ScopeInterface::SCOPE_STORE, $storeId
		// );
		return $this->scopeConfig->getValue($field, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	}

	public function getGeneralConfig($code, $storeId = null)
	{

		return $this->getConfigValue(self::XML_CONFIG_ADDITIONALFEE .'general/'. $code, $storeId);
	}

}