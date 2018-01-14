<?php
namespace Test\Swati\Model\ResourceModel\Factor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'test_swati_factor_collection';
	protected $_eventObject = 'factor_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Test\Swati\Model\Factor', 'Test\Swati\Model\ResourceModel\Factor');
	}

}