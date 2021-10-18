<?php

namespace Classes;

class Company
{

    private $id;
    private $CUIL;
    private $legalName;
    private $address;
    private $contactNumber;
    private $email;





    /**
     * Get the value of CUIL
     */
    public function getCUIL()
    {
        return $this->CUIL;
    }

    /**
     * Set the value of CUIL
     */
    public function setCUIL($CUIL): self
    {
        $this->CUIL = $CUIL;

        return $this;
    }

    /**
     * Get the value of legalName
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Set the value of legalName
     */
    public function setLegalName($legalName): self
    {
        $this->legalName = $legalName;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of contactNumber
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set the value of contactNumber
     */
    public function setContactNumber($contactNumber): self
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}
