<?php

namespace TrainingShivendra\Customeriprestriction\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $ip;

	 public function __construct(
        \TrainingShivendra\Customeriprestriction\Model\Ip $ip
        
    )
    {
        $this->ip = $ip;
    }

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$data = [
			'ip'         => "127.0.0.1"
		];
		$this->ip->addData($data)->save();
	}
}