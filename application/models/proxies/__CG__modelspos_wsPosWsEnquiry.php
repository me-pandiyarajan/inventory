<?php

namespace Proxies\__CG__\models\pos_ws;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PosWsEnquiry extends \models\pos_ws\PosWsEnquiry implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getEnquiryid()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["enquiryid"];
        }
        $this->__load();
        return parent::getEnquiryid();
    }

    public function setAmountCollected($amountCollected)
    {
        $this->__load();
        return parent::setAmountCollected($amountCollected);
    }

    public function getAmountCollected()
    {
        $this->__load();
        return parent::getAmountCollected();
    }

    public function setAppointmentDate($appointmentDate)
    {
        $this->__load();
        return parent::setAppointmentDate($appointmentDate);
    }

    public function getAppointmentDate()
    {
        $this->__load();
        return parent::getAppointmentDate();
    }

    public function setProductType($productType)
    {
        $this->__load();
        return parent::setProductType($productType);
    }

    public function getProductType()
    {
        $this->__load();
        return parent::getProductType();
    }

    public function setCheckin($checkin)
    {
        $this->__load();
        return parent::setCheckin($checkin);
    }

    public function getCheckin()
    {
        $this->__load();
        return parent::getCheckin();
    }

    public function setCheckout($checkout)
    {
        $this->__load();
        return parent::setCheckout($checkout);
    }

    public function getCheckout()
    {
        $this->__load();
        return parent::getCheckout();
    }

    public function setWorkDescription($workDescription)
    {
        $this->__load();
        return parent::setWorkDescription($workDescription);
    }

    public function getWorkDescription()
    {
        $this->__load();
        return parent::getWorkDescription();
    }

    public function setProblem($problem)
    {
        $this->__load();
        return parent::setProblem($problem);
    }

    public function getProblem()
    {
        $this->__load();
        return parent::getProblem();
    }

    public function setPosCustomerCustomer($posCustomerCustomer = NULL)
    {
        $this->__load();
        return parent::setPosCustomerCustomer($posCustomerCustomer);
    }

    public function getPosCustomerCustomer()
    {
        $this->__load();
        return parent::getPosCustomerCustomer();
    }

    public function setCustomerSignature($customerSignature)
    {
        $this->__load();
        return parent::setCustomerSignature($customerSignature);
    }

    public function getCustomerSignature()
    {
        $this->__load();
        return parent::getCustomerSignature();
    }

    public function setImageProof($imageProof)
    {
        $this->__load();
        return parent::setImageProof($imageProof);
    }

    public function getImageProof()
    {
        $this->__load();
        return parent::getImageProof();
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

    public function setAssignedMarketingRep($assignedMarketingRep = NULL)
    {
        $this->__load();
        return parent::setAssignedMarketingRep($assignedMarketingRep);
    }

    public function getAssignedMarketingRep()
    {
        $this->__load();
        return parent::getAssignedMarketingRep();
    }

    public function setAssignedSupervisor($assignedSupervisor = NULL)
    {
        $this->__load();
        return parent::setAssignedSupervisor($assignedSupervisor);
    }

    public function getAssignedSupervisor()
    {
        $this->__load();
        return parent::getAssignedSupervisor();
    }

    public function setAssignedBy($assignedBy = NULL)
    {
        $this->__load();
        return parent::setAssignedBy($assignedBy);
    }

    public function getAssignedBy()
    {
        $this->__load();
        return parent::getAssignedBy();
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

    public function setPosProjectsProjectid($posProjectsProjectid = NULL)
    {
        $this->__load();
        return parent::setPosProjectsProjectid($posProjectsProjectid);
    }

    public function getPosProjectsProjectid()
    {
        $this->__load();
        return parent::getPosProjectsProjectid();
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
        return array('__isInitialized__', 'enquiryid', 'amountCollected', 'appointmentDate', 'productType', 'checkin', 'checkout', 'workDescription', 'problem', 'customerSignature', 'status', 'createdDate', 'lastUpdatedDate', 'posCustomerCustomer', 'assignedMarketingRep', 'assignedSupervisor', 'assignedBy', 'createdBy', 'posProjectsProjectid', 'lastUpdatedBy');
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