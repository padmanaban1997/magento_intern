<?php
namespace Pfay\Contacts\Model\ResourceModel\Contact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'pfay_contacts_id';
	protected $_eventPrefix = 'pfay_contacts_contact_collection';
	protected $_eventObject = 'contact_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Pfay\Contacts\Model\Contact', 'Pfay\Contacts\Model\ResourceModel\Contact');
	}

}