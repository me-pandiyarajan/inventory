<?php



namespace models\inventory;

/**
 * Suppliers
 *
 * @Table(name="suppliers")
 * @Entity
 */
class Suppliers
{
    /**
     * @var integer $supplierId
     *
     * @Column(name="supplier_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $supplierId;

    /**
     * @var string $supplierName
     *
     * @Column(name="supplier_name", type="string", length=45, nullable=true)
     */
    private $supplierName;

    /**
     * @var integer $telephone
     *
     * @Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string $street
     *
     * @Column(name="street", type="string", length=45, nullable=true)
     */
    private $street;

    /**
     * @var string $state
     *
     * @Column(name="state", type="string", length=45, nullable=true)
     */
    private $state;

    /**
     * @var integer $zipCode
     *
     * @Column(name="zip_code", type="integer", nullable=true)
     */
    private $zipCode;

    /**
     * @var string $city
     *
     * @Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string $country
     *
     * @Column(name="country", type="string", length=45, nullable=true)
     */
    private $country;

    /**
     * @var boolean $status
     *
     * @Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var datetime $createdDate
     *
     * @Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var datetime $lastUpdatedDate
     *
     * @Column(name="last_updated_date", type="datetime", nullable=true)
     */
    private $lastUpdatedDate;

    /**
     * @var integer $createdBy
     *
     * @Column(name="created_by", type="integer", nullable=true)
     */
    private $createdBy;

    /**
     * @var integer $lastUpdatedBy
     *
     * @Column(name="last_updated_by", type="integer", nullable=true)
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
     * Set telephone
     *
     * @param integer $telephone
     * @return Suppliers
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
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
     * Set createdDate
     *
     * @param datetime $createdDate
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
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set lastUpdatedDate
     *
     * @param datetime $lastUpdatedDate
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
     * @return datetime 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Suppliers
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param integer $lastUpdatedBy
     * @return Suppliers
     */
    public function setLastUpdatedBy($lastUpdatedBy)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return integer 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}