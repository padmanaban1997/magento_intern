<?php

namespace Navigate\Contactus\Api\Data;

interface ContactInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const TELEPHONE = 'telephone';
    const COMPANY='company';
    const WEBSITE='website'; 
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

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


    public function getCompany();
    public function setCompany($company);


    public function getWebsite();
    public function setWebsite($website);

  

    public function getDescription();
    public function setDescription($description);

    public function getCreatedAt();

    public function setCreatedAt($createdAt);

    public function getUpdatedAt();
    public function setUpdatedAt($updatedAt);


}