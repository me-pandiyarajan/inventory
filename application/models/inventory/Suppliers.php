<?php

namespace models\inventory;


/**
 * models\inventory\Suppliers
 *
 * @Table(name="suppliers")
 * @Entity
 */
class Suppliers
{
    /**
     * @var integer $supplierId
     *
     * @Column(name="supplier_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $supplierId;

    /**
     * @var string $supplierName
     *
     * @Column(name="supplier_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $supplierName;

    /**
     * @var string $mobile
     *
     * @Column(name="mobile", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $mobile;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string $street
     *
     * @Column(name="street", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $street;

    /**
     * @var string $state
     *
     * @Column(name="state", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $state;

    /**
     * @var integer $zipCode
     *
     * @Column(name="zip_code", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $zipCode;

    /**
     * @var string $city
     *
     * @Column(name="city", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $city;

    /**
     * @var string $country
     *
     * @Column(name="country", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $country;

    /**
     * @var boolean $status
     *
     * @Column(name="status", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var boolean $deleted
     *
     * @Column(name="deleted", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $deleted;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdDate;

    /**
     * @var integer $lastUpdatedDate
     *
     * @Column(name="last_updated_date", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastUpdatedDate;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $createdBy;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $lastUpdatedBy;


    /**
     * Get supplierId
     *
     * @return integer 
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * Set supplierName
     *
     * @param string $supplierName
     * @return Suppliers
     */
    public function setSupplierName($supplierName)
    {
        $this->supplierName = $supplierName;
        return $this;
    }

    /**
     * Get supplierName
     *
     * @return string 
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Suppliers
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Suppliers
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Suppliers
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Suppliers
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     * @return Suppliers
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Suppliers
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Suppliers
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Suppliers
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Suppliers
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return Suppliers
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return integer 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set lastUpdatedDate
     *
     * @param integer $lastUpdatedDate
     * @return Suppliers
     */
    public function setLastUpdatedDate($lastUpdatedDate)
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
        return $this;
    }

    /**
     * Get lastUpdatedDate
     *
     * @return integer 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set createdBy
     *
     * @param models\inventory\Users $createdBy
     * @return Suppliers
     */
    public function setCreatedBy($createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return models\inventory\Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param models\inventory\Users $lastUpdatedBy
     * @return Suppliers
     */
    public function setLastUpdatedBy($lastUpdatedBy = null)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return models\inventory\Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}