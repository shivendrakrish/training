<?php
namespace TrainingShivendra\AdditionalFee\Block\Sales\Order;
class Fee extends \Magento\Framework\View\Element\Template
{
    protected $_config;
    protected $_order;
    protected $_source;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Tax\Model\Config $taxConfig,
        array $data = []
    ) {
        $this->_config = $taxConfig;
        parent::__construct($context, $data);
    }
    public function displayFullSummary()
    {
        return true;
    }
    public function getSource()
    {
        return $this->_source;
    } 
    public function getStore()
    {
        return $this->_order->getStore();
    }
    public function getOrder()
    {
        return $this->_order;
    }
    public function getLabelProperties()
    {
        return $this->getParentBlock()->getLabelProperties();
    }
    public function getValueProperties()
    {
        return $this->getParentBlock()->getValueProperties();
    }

    public function initTotals()
    {

        $parent = $this->getParentBlock();
        $this->_order = $parent->getOrder();
        $this->_source = $parent->getSource();
        $store = $this->getStore();
        $fee = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'strong' => false,
                    'value' => 1,
                    //'value' => $this->_source->getFee(),
                    'label' => __('Fee'),
                ]
            );
            $parent->addTotal($fee, 'fee');
           // $this->_addTax('grand_total');
            $parent->addTotal($fee, 'fee');
            return $this;
    }

}