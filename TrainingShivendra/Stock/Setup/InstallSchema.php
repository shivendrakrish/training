<?php 
namespace TrainingShivendra\Stock\Setup;
 
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('stocklist')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('stocklist')
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
					'p_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					['nullable => false'],
					'Product ID'
				)
				->addColumn(
					'p_sku',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					11,
					[],
					'Sku'
				)
				->addColumn(
					'adjst_qty',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					[],
					'Adjusted Quantity'
				)
				->addColumn(
					'prev_qty',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					[],
					'Previous Quantity'
				)
				->addColumn(
					'current_qty',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					[],
					'Current Quantity'
				)
				->addColumn(
					'updated_by',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					11,
					[],
					'Updated By'
				)
				->addColumn(
					'created_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created At'
				)
				->addColumn(
					'reason',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'Reason'
				)->setComment('Quantity Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('stocklist'),
				$setup->getIdxName(
					$installer->getTable('stocklist'),
					['updated_by', 'reason'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['updated_by', 'reason'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
