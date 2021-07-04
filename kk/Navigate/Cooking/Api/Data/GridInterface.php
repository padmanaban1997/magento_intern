<?php

namespace Navigate\Cooking\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const TELEPHONE = 'telephone';
    const NO_OF_PEOPLE ='no_of_people';
    const COURSE ='course';
    const  DESCRIPTION = 'description';
  
    const IS_ACTIVE = 'is_active';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);


    public function getFirstName();

  
    public function setFirstName($firstName);


    public function getLastName();

    public function setLastName($lastName);

    public function getEmail();

    public function setEmail($email);

    public function getTelephone();

    public function setTelephone($telephone);

    public function getNumberOfPeople();
    public function setNumberOfPeople($noOfPeople);

    public function getCourse();
    public function setCourse($course);


    public function getDescription();

    public function setDescription($description);



    public function getIsActive();

    /**
     * Set StartingPrice.
     */
    public function setIsActive($isActive);

    public function getUpdatedAt();
    public function setUpdatedAt($updatedAt);


    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}