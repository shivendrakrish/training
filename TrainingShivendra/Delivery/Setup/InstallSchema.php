<?php

namespace TrainingShivendra\Delivery\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $installer->getConnection()->addColumn(
            $installer->getTable('quote'),
            'delivery_type',
            [
                'type' => 'varchar',
                'nullable' => false,
                'length' => 255,
                'comment' => 'Delivery Type',
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
            'delivery_type',
            [
                'type' => 'varchar',
                'nullable' => false,
                'length' => 255,
                'comment' => 'Delivery Type',
            ]
        );

        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            'delivery_type',
            [
                'type' => 'varchar',
                'nullable' => false,
                'length' => 255,
                'comment' => 'Delivery Type',
            ]
        );

        $setup->endSetup();
    }
}