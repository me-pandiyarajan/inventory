<?php

namespace Proxies\__CG__\models\inventory;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Products extends \models\inventory\Products implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getProductGenId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["productGenId"];
        }
        $this->__load();
        return parent::getProductGenId();
    }

    public function setProductIdPlu($productIdPlu)
    {
        $this->__load();
        return parent::setProductIdPlu($productIdPlu);
    }

    public function getProductIdPlu()
    {
        $this->__load();
        return parent::getProductIdPlu();
    }

    public function setSku($sku)
    {
        $this->__load();
        return parent::setSku($sku);
    }

    public function getSku()
    {
        $this->__load();
        return parent::getSku();
    }

    public function setBarcodeimage($barcodeimage)
    {
        $this->__load();
        return parent::setBarcodeimage($barcodeimage);
    }

    public function getBarcodeimage()
    {
        $this->__load();
        return parent::getBarcodeimage();
    }

    public function setProductName($productName)
    {
        $this->__load();
        return parent::setProductName($productName);
    }

    public function getProductName()
    {
        $this->__load();
        return parent::getProductName();
    }

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setShortDescription($shortDescription)
    {
        $this->__load();
        return parent::setShortDescription($shortDescription);
    }

    public function getShortDescription()
    {
        $this->__load();
        return parent::getShortDescription();
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

    public function setCountryOfManufacture($countryOfManufacture)
    {
        $this->__load();
        return parent::setCountryOfManufacture($countryOfManufacture);
    }

    public function getCountryOfManufacture()
    {
        $this->__load();
        return parent::getCountryOfManufacture();
    }

    public function setPrice($price)
    {
        $this->__load();
        return parent::setPrice($price);
    }

    public function getPrice()
    {
        $this->__load();
        return parent::getPrice();
    }

    public function setSpecialPriceFrom($specialPriceFrom)
    {
        $this->__load();
        return parent::setSpecialPriceFrom($specialPriceFrom);
    }

    public function getSpecialPriceFrom()
    {
        $this->__load();
        return parent::getSpecialPriceFrom();
    }

    public function setSpecialPriceTo($specialPriceTo)
    {
        $this->__load();
        return parent::setSpecialPriceTo($specialPriceTo);
    }

    public function getSpecialPriceTo()
    {
        $this->__load();
        return parent::getSpecialPriceTo();
    }

    public function setInstallationCharges($installationCharges)
    {
        $this->__load();
        return parent::setInstallationCharges($installationCharges);
    }

    public function getInstallationCharges()
    {
        $this->__load();
        return parent::getInstallationCharges();
    }

    public function setUploadImage($uploadImage)
    {
        $this->__load();
        return parent::setUploadImage($uploadImage);
    }

    public function getUploadImage()
    {
        $this->__load();
        return parent::getUploadImage();
    }

    public function setQuantity($quantity)
    {
        $this->__load();
        return parent::setQuantity($quantity);
    }

    public function getQuantity()
    {
        $this->__load();
        return parent::getQuantity();
    }

    public function setUnit($unit)
    {
        $this->__load();
        return parent::setUnit($unit);
    }

    public function getUnit()
    {
        $this->__load();
        return parent::getUnit();
    }

    public function setMaterial($material)
    {
        $this->__load();
        return parent::setMaterial($material);
    }

    public function getMaterial()
    {
        $this->__load();
        return parent::getMaterial();
    }

    public function setStockAvailability($stockAvailability)
    {
        $this->__load();
        return parent::setStockAvailability($stockAvailability);
    }

    public function getStockAvailability()
    {
        $this->__load();
        return parent::getStockAvailability();
    }

    public function setSafetyStockLevel($safetyStockLevel)
    {
        $this->__load();
        return parent::setSafetyStockLevel($safetyStockLevel);
    }

    public function getSafetyStockLevel()
    {
        $this->__load();
        return parent::getSafetyStockLevel();
    }

    public function setPosStockLevel($posStockLevel)
    {
        $this->__load();
        return parent::setPosStockLevel($posStockLevel);
    }

    public function getPosStockLevel()
    {
        $this->__load();
        return parent::getPosStockLevel();
    }

    public function setDimenUnit($dimenUnit)
    {
        $this->__load();
        return parent::setDimenUnit($dimenUnit);
    }

    public function getDimenUnit()
    {
        $this->__load();
        return parent::getDimenUnit();
    }

    public function setWeight($weight)
    {
        $this->__load();
        return parent::setWeight($weight);
    }

    public function getWeight()
    {
        $this->__load();
        return parent::getWeight();
    }

    public function setWidth($width)
    {
        $this->__load();
        return parent::setWidth($width);
    }

    public function getWidth()
    {
        $this->__load();
        return parent::getWidth();
    }

    public function setLength($length)
    {
        $this->__load();
        return parent::setLength($length);
    }

    public function getLength()
    {
        $this->__load();
        return parent::getLength();
    }

    public function setHeight($height)
    {
        $this->__load();
        return parent::setHeight($height);
    }

    public function getHeight()
    {
        $this->__load();
        return parent::getHeight();
    }

    public function setDesignName($designName)
    {
        $this->__load();
        return parent::setDesignName($designName);
    }

    public function getDesignName()
    {
        $this->__load();
        return parent::getDesignName();
    }

    public function setShade($shade)
    {
        $this->__load();
        return parent::setShade($shade);
    }

    public function getShade()
    {
        $this->__load();
        return parent::getShade();
    }

    public function setProductActivated($productActivated)
    {
        $this->__load();
        return parent::setProductActivated($productActivated);
    }

    public function getProductActivated()
    {
        $this->__load();
        return parent::getProductActivated();
    }

    public function setApproved($approved)
    {
        $this->__load();
        return parent::setApproved($approved);
    }

    public function getApproved()
    {
        $this->__load();
        return parent::getApproved();
    }

    public function setApprovedDate($approvedDate)
    {
        $this->__load();
        return parent::setApprovedDate($approvedDate);
    }

    public function getApprovedDate()
    {
        $this->__load();
        return parent::getApprovedDate();
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

    public function setSuppplierProductName($suppplierProductName)
    {
        $this->__load();
        return parent::setSuppplierProductName($suppplierProductName);
    }

    public function getSuppplierProductName()
    {
        $this->__load();
        return parent::getSuppplierProductName();
    }

    public function setSupplierDesignName($supplierDesignName)
    {
        $this->__load();
        return parent::setSupplierDesignName($supplierDesignName);
    }

    public function getSupplierDesignName()
    {
        $this->__load();
        return parent::getSupplierDesignName();
    }

    public function setSupplierShadeName($supplierShadeName)
    {
        $this->__load();
        return parent::setSupplierShadeName($supplierShadeName);
    }

    public function getSupplierShadeName()
    {
        $this->__load();
        return parent::getSupplierShadeName();
    }

    public function setCategoriesCategory($categoriesCategory = NULL)
    {
        $this->__load();
        return parent::setCategoriesCategory($categoriesCategory);
    }

    public function getCategoriesCategory()
    {
        $this->__load();
        return parent::getCategoriesCategory();
    }

    public function setPosTaxTaxClass($posTaxTaxClass = NULL)
    {
        $this->__load();
        return parent::setPosTaxTaxClass($posTaxTaxClass);
    }

    public function getPosTaxTaxClass()
    {
        $this->__load();
        return parent::getPosTaxTaxClass();
    }

    public function setSuppliersSupplier($suppliersSupplier = NULL)
    {
        $this->__load();
        return parent::setSuppliersSupplier($suppliersSupplier);
    }

    public function getSuppliersSupplier()
    {
        $this->__load();
        return parent::getSuppliersSupplier();
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

    public function setApprovedBy($approvedBy = NULL)
    {
        $this->__load();
        return parent::setApprovedBy($approvedBy);
    }

    public function getApprovedBy()
    {
        $this->__load();
        return parent::getApprovedBy();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'productGenId', 'productIdPlu', 'sku', 'barcodeimage', 'productName', 'description', 'shortDescription', 'status', 'countryOfManufacture', 'price', 'specialPriceFrom', 'specialPriceTo', 'installationCharges', 'uploadImage', 'quantity', 'unit', 'material', 'stockAvailability', 'safetyStockLevel', 'posStockLevel', 'dimenUnit', 'weight', 'width', 'length', 'height', 'designName', 'shade', 'productActivated', 'approved', 'approvedDate', 'deleted', 'createdDate', 'lastUpdatedDate', 'suppplierProductName', 'supplierDesignName', 'supplierShadeName', 'categoriesCategory', 'posTaxTaxClass', 'suppliersSupplier', 'createdBy', 'lastUpdatedBy', 'approvedBy');
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