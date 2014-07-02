<?php

namespace Proxies\__CG__\models\pos;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class PosInvoices extends \models\pos\PosInvoices implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getInvoiceid()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["invoiceid"];
        }
        $this->__load();
        return parent::getInvoiceid();
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->__load();
        return parent::setInvoiceNumber($invoiceNumber);
    }

    public function getInvoiceNumber()
    {
        $this->__load();
        return parent::getInvoiceNumber();
    }

    public function setTransacMode($transacMode)
    {
        $this->__load();
        return parent::setTransacMode($transacMode);
    }

    public function getTransacMode()
    {
        $this->__load();
        return parent::getTransacMode();
    }

    public function setTenderedby($tenderedby)
    {
        $this->__load();
        return parent::setTenderedby($tenderedby);
    }

    public function getTenderedby()
    {
        $this->__load();
        return parent::getTenderedby();
    }

    public function setPaymentStatus($paymentStatus)
    {
        $this->__load();
        return parent::setPaymentStatus($paymentStatus);
    }

    public function getPaymentStatus()
    {
        $this->__load();
        return parent::getPaymentStatus();
    }

    public function setSpecialInstructions($specialInstructions)
    {
        $this->__load();
        return parent::setSpecialInstructions($specialInstructions);
    }

    public function getSpecialInstructions()
    {
        $this->__load();
        return parent::getSpecialInstructions();
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
        return array('__isInitialized__', 'invoiceid', 'invoiceNumber', 'transacMode', 'tenderedby', 'paymentStatus', 'specialInstructions', 'status', 'createdDate', 'lastUpdatedDate', 'posCustomerCustomer', 'createdBy', 'lastUpdatedBy');
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