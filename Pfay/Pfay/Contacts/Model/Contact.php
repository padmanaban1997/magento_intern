<?php
namespace Pfay\Contacts\Model;
class Contact extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'pfay_contacts_contact';

	protected $_cacheTag = 'pfay_contacts_contact';

	protected $_eventPrefix = 'pfay_contacts_contact';

	protected function _construct()
	{
		$this->_init('Pfay\Contacts\Model\ResourceModel\Contact');
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
