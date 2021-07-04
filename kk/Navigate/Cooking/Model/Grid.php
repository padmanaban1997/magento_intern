<?php

namespace Navigate\Cooking\Model;

use Navigate\Cooking\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'ck_grid_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'ck_grid_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'ck_grid_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Navigate\Cooking\Model\ResourceModel\Grid');
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
        
    public function getNumberOfPeople()
    {
        return $this->getData(self::NO_OF_PEOPLE);
    }

 
    public function setNumberOfPeople($noOfPeople)
    {
        return $this->setData(self::NO_OF_PEOPLE, $noOfPeople);
    }

    public function getCourse()
    {
        return $this->getData(self::COURSE);
    }

 
    public function setCourse($course)
    {
        return $this->setData(self::COURSE, $course);
    }

    



    
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set Content.
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

 
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

   
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

  
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }


    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

  
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}