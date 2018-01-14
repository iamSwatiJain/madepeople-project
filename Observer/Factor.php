<?php

namespace Test\Swati\Observer;

class Factor implements \Magento\Framework\Event\ObserverInterface
{
	protected $_helperData;
	protected $_factorFactory;
  protected $_order;

	public function __construct(
		\Test\Swati\Helper\Data $helperData,
		\Test\Swati\Model\FactorFactory $factorFactory,
		\Magento\Sales\Model\Order $order
		)
	{
		$this->_helperData = $helperData;
		$this->_factorFactory = $factorFactory;
		$this->_order = $order;
	}

	public function execute(
    \Magento\Framework\Event\Observer $observer)
	{
    $enabled = $this->_helperData->getGeneralConfig('enable');
    $factor = $this->_helperData->getGeneralConfig('decimalfactor');    
	
		$id = $observer->getEvent()->getOrderIds()[0];
		$order = $this->_order->load($id);
		$total = $order->getGrandTotal();
	
    if ($enabled) {
      $model = $this->_factorFactory->create();
      $model->setOrderId($id);
      $model->setTotal($total);
      $model->setWithDecifactor($factor * $total);
      $model->save();
    }
		
		return $this;
	}
}