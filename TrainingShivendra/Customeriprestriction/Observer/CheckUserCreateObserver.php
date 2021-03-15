<?php                                                         
 namespace TrainingShivendra\Customeriprestriction\Observer;                        
 class CheckUserCreateObserver implements \Magento\Framework\Event\ObserverInterface                                
 {

// public function __construct(
//     ......
//     ......
//     )
// {
//     ......
// }
public function execute(
    \Magento\Framework\Event\Observer $observer
) {

    $customer = $observer->getEvent()->getData('customer');

}}