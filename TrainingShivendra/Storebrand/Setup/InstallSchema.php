<?php 
namespace TrainingShivendra\Storebrand\Setup;
 
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('storebrandlist')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('storebrandlist')
			)
				->addColumn(
					's_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'ID'
				)
				->addColumn(
					'store_name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					11,
					[],
					'Store Name'
				)
				->addColumn(
					'url',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Store URL'
				)
				->addColumn(
					'entity_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'E id'
				)
				->addColumn(
					'product_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'P Id'
				)
				->addColumn(
					'position',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Position'
				)
				
				->addColumn(
					'banner',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'Banner'
				)
				->addColumn(
					'cat_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'Cat Id'
				)
				->addColumn(
					'product',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'Our Product'
				)->setComment('Store Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('storebrandlist'),
				$setup->getIdxName(
					$installer->getTable('storebrandlist'),
					['store_name', 'url'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['store_name', 'url'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
