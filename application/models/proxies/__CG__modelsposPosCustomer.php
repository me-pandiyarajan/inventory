<?php

namespace Proxies\__CG__\models\pos;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PosCustomer extends \models\pos\PosCustomer implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getCustomerId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["customerId"];
        }
        $this->__load();
        return parent::getCustomerId();
    }

    public function setCustomername($customername)
    {
        $this->__load();
        return parent::setCustomername($customername);
    }

    public function getCustomername()
    {
        $this->__load();
        return parent::getCustomername();
    }

    public function setMobileNumber($mobileNumber)
    {
        $this->__load();
        return parent::setMobileNumber($mobileNumber);
    }

    public function getMobileNumber()
    {
        $this->__load();
        return parent::getMobileNumber();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setStreet($street)
    {
        $this->__load();
        return parent::setStreet($street);
    }

    public function getStreet()
    {
        $this->__load();
        return parent::getStreet();
    }

    public function setCity($city)
    {
        $this->__load();
        return parent::setCity($city);
    }

    public function getCity()
    {
        $this->__load();
        return parent::getCity();
    }

    public function setState($state)
    {
        $this->__load();
        return parent::setState($state);
    }

    public function getState()
    {
        $this->__load();
        return parent::getState();
    }

    public function setZipCode($zipCode)
    {
        $this->__load();
        return parent::setZipCode($zipCode);
    }

    public function getZipCode()
    {
        $this->__load();
        return parent::getZipCode();
    }

    public function setDStreet($dStreet)
    {
        $this->__load();
        return parent::setDStreet($dStreet);
    }

    public function getDStreet()
    {
        $this->__load();
        return parent::getDStreet();
    }

    public function setDCity($dCity)
    {
        $this->__load();
        return parent::setDCity($dCity);
    }

    public function getDCity()
    {
        $this->__load();
        return parent::getDCity();
    }

    public function setDState($dState)
    {
        $this->__load();
        return parent::setDState($dState);
    }

    public function getDState()
    {
        $this->__load();
        return parent::getDState();
    }

    public function setDZipcode($dZipcode)
    {
        $this->__load();
        return parent::setDZipcode($dZipcode);
    }

    public function getDZipcode()
    {
        $this->__load();
        return parent::getDZipcode();
    }

    public function setLatitude($latitude)
    {
        $this->__load();
        return parent::setLatitude($latitude);
    }

    public function getLatitude()
    {
        $this->__load();
        return parent::getLatitude();
    }

    public function setLongitude($longitude)
    {
        $this->__load();
        return parent::setLongitude($longitude);
    }

    public function getLongitude()
    {
        $this->__load();
        return parent::getLongitude();
    }

    public function setStatus($status)
    {
        $this->__load();
        return parent::setStatus($status);
    }

    public function getStatus()
    {
        $this->__load();
        return parent::getStatus();
    }

    public function setDeleted($deleted)
    {
        $this->__load();
        return parent::setDeleted($deleted);
    }

    public function getDeleted()
    {
        $this->__load();
        return parent::getDeleted();
    }

    public function setCreatedDate($createdDate)
    {
        $this->__load();
        return parent::setCreatedDate($createdDate);
    }

    public function getCreatedDate()
    {
        $this->__load();
        return parent::getCreatedDate();
    }

    public function setLastUpdatedDate($lastUpdatedDate)
    {
        $this->__load();
        return parent::setLastUpdatedDate($lastUpdatedDate);
    }

    public function getLastUpdatedDate()
    {
        $this->__load();
        return parent::getLastUpdatedDate();
    }

    public function setGroupCustomerCustomerGroup($groupCustomerCustomerGroup = NULL)
    {
        $this->__load();
        return parent::setGroupCustomerCustomerGroup($groupCustomerCustomerGroup);
    }

    public function getGroupCustomerCustomerGroup()
    {
        $this->__load();
        return parent::getGroupCustomerCustomerGroup();
    }

    public function setCreatedBy($createdBy = NULL)
    {
        $this->__load();
        return parent::setCreatedBy($createdBy);
    }

    public function getCreatedBy()
    {
        $this->__load();
        return parent::getCreatedBy();
    }

    public function setLastUpdatedBy($lastUpdatedBy = NULL)
    {
        $this->__load();
        return parent::setLastUpdatedBy($lastUpdatedBy);
    }

    public function getLastUpdatedBy()
    {
        $this->__load();
        return parent::getLastUpdatedBy();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'customerId', 'customername', 'mobileNumber', 'email', 'street', 'city', 'state', 'zipCode', 'dStreet', 'dCity', 'dState', 'dZipcode', 'latitude', 'longitude', 'status', 'deleted', 'createdDate', 'lastUpdatedDate', 'groupCustomerCustomerGroup', 'createdBy', 'lastUpdatedBy');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}