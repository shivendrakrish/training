<?php

namespace TrainingShivendra\Storebrand\Controller;

use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Url;

class Router implements RouterInterface
{
    protected $actionFactory;
    protected $dispatched;


    public function __construct(
        ActionFactory $actionFactory
        )
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        if (!$this->dispatched) {
             $urlKey = trim($request->getPathInfo(), '/');
            $keydata = explode("-",$urlKey);
            if ($keydata[0] == 'storebrand') {

                $request->setModuleName('storebrand')
                    ->setControllerName('index')
                    ->setActionName('index');
                $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $urlKey);
                $this->dispatched = true;
                return $this->actionFactory->create(
                    'Magento\Framework\App\Action\Forward',
                    ['request' => $request]
                );  
            }
                       
        }
    }
}