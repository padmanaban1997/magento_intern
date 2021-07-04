<?php

namespace Navigate\Contactus\Model;

use Navigate\Contactus\Api\Data\ContactInterface;

class Contact extends \Magento\Framework\Model\AbstractModel implements ContactInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'navigate_contactus';

    /**
     * @var string
     */
    protected $_cacheTag = 'navigate_contactus';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'navigate_contactus';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Navigate\Contactus\Model\ResourceModel\Contact');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }


    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

 
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }


    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

 
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }


    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

 
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

   

    public function getTelephone()
    {
        return $this->getData(self::TELEPHONE);
    }

 
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    public function getCompany()
    {
        return $this->getData(self::COMPANY);
    }

 
    public function setCompany($company)
    {
        return $this->setData(self::COMPANY, $company);
    }

    public function getWebsite()
    {
        return $this->getData(self::WEBSITE);
    }

 
    public function setWebsite($website)
    {
        return $this->setData(self::WEBSITE, $website);
    }

   
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

 
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

   
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

   
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }


}