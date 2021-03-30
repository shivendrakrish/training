<?php
namespace TrainingShivendra\Customeriprestriction\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		// $installer = $setup;
		// $installer->startSetup();
		// if (!$installer->tableExists('restricted_ip')) {
		// 	$table = $installer->getConnection()->newTable(
		// 		$installer->getTable('restricted_ip')
		// 	)
		// 		->addColumn(
		// 			'ip_id',
		// 			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
		// 			null,
		// 			[
		// 				'identity' => true,
		// 				'nullable' => false,
		// 				'primary'  => true,
		// 				'unsigned' => true,
		// 			],
		// 			'IP ID'
		// 		)
		// 		->addColumn(
		// 			'ip',
		// 			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
		// 			255,
		// 			['nullable => false'],
		// 			'IP Address'
		// 		)
		// 		->setComment('IP Table');
		// 	$installer->getConnection()->createTable($table);

		// 	$installer->getConnection()->addIndex(
		// 		$installer->getTable('restricted_ip'),
		// 		$setup->getIdxName(
		// 			$installer->getTable('restricted_ip'),
		// 			['ip'],
		// 			\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
		// 		),
		// 		['ip'],
		// 		\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
		// 	);
		// }
		// $installer->endSetup();

		$installer = $setup;
 
        $installer->startSetup();
        //Create  TABLE
        $table = $installer->getConnection()
            ->newTable($installer->getTable('restricted_ip'))
            ->addColumn(
                'ip_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Ip Id'
            )->addColumn(
                'ip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'IP Address'
            );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
	}
}