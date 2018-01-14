<?php
namespace Test\Swati\Model;
class Factor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'test_swati_factor';

	protected $_cacheTag = 'test_swati_factor';

	protected $_eventPrefix = 'test_swati_factor';

	protected function _construct()
	{
		$this->_init('Test\Swati\Model\ResourceModel\Factor');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}