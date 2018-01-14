<?php
namespace Test\Swati\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('test_swati_factor')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('test_swati_factor')
				)
					->addColumn(
						'id',
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
						'order_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'nullable' => false
						],
						'Order ID'
					)
					->addColumn(
						'total',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            null,
            [
              'scale'     => 4,
              'precision' => 10,
            ],
            'Total amount'
					)
					->addColumn(
						'with_decifactor',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            null,
            [
              'scale'     => 4,
              'precision' => 10,
            ],
            'Amount Paid with Decimal Factor'
					);
				$installer->getConnection()->createTable($table);
		}
		$installer->endSetup();
	}
}