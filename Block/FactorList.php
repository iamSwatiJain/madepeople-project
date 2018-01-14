<?php
namespace Test\Swati\Block;
use Magento\Framework\View\Element\Template;

class FactorList extends Template
{    
	protected $_factorFactory;
	protected $_helperData;
	
  public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Test\Swati\Model\FactorFactory $factorFactory,
    \Test\Swati\Helper\Data $helperData,
    array $data = []
  )
	{
		$this->_factorFactory = $factorFactory;
		$this->_helperData = $helperData;
    parent::__construct($context, $data);
	}
	
  protected function _prepareLayout()
  {
    $enabled = $this->_helperData->getGeneralConfig('enable');
    $factor = $this->_helperData->getGeneralConfig('decimalfactor');
	
		$factory = $this->_factorFactory->create();		
		$collection = $factory->getCollection();
		
		$this->setEnabled($enabled);
    $this->setFactor($factor);
    $this->setItems($collection->getItems());
  }
}