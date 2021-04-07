<?php
namespace TrainingShivendra\Delivery\Observer;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
class SaveDeliveryTypeObserver implements ObserverInterface
{
   
    protected $_quote;
    protected $_order;
    protected $_date;
    protected $_productCollectionFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Quote\Model\Quote $quote,
        \Magento\Sales\Model\Order $order,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,        
              array $data = []
    )
    {
        $this->_quote = $quote;
        $this->_order = $order;
        $this->_date = $date;
        $this->_productCollectionFactory = $productCollectionFactory;
    }

    public function execute(EventObserver $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $pids = [];
        $order_id = $order->getIncrementId();
        foreach($order->getAllItems() as $item) {
                      array_push($pids, $item->getProductId());
        }
        $sameDayenable = [];
        foreach ($pids as $prductId) {
                    $collection = $this->_productCollectionFactory->create();

                $prou =  $collection->getData($prductId);
                array_push($sameDayenable, $collection->getData('same_day_delivery'));
        }
        $delivertType = "";
        $currenttime = $this->_date->gmtDate('Y-m-d H:i:s a');
        $samedatdeliverytime = $this->_date->gmtDate('Y-m-d').' 04:00:00 pm';
        if (!empty($sameDayenable)) {
            if ($currenttime > $samedatdeliverytime) {
              $delivertType = "Same Day delivery";
            }
            if ($currenttime < $samedatdeliverytime) {
              $delivertType = "Delivery tomorrow";
            } 
        } else {               
             $delivertType = "Express Delivery";
        }
        $order = $observer->getEvent()->getOrder();
        $order->setDeliveryType($delivertType);
        $order->save();
        return $this;
    }

}