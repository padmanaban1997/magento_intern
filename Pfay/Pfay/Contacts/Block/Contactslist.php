<?php
namespace Pfay\Contacts\Block;
use Magento\Framework\View\Element\Template;

class Contactslist extends \Magento\Framework\View\Element\Template
{
    private $_contact;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Pfay\Contacts\Model\Contact $contact,
        \Magento\Framework\App\ResourceConnection $resource,
        array $data = []
    ) {
        $this->_contact = $contact;
        $this->_resource = $resource;

        parent::__construct(
            $context,
            $data
        );
    }

    public function getContacts()   
    {
        $collection = $this->_contact->getCollection();
        return $collection;
    }
}