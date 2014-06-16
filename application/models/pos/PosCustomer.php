<?php

namespace models\pos;


/**
 * models\pos\PosCustomer
 *
 * @Table(name="pos_customer")
 * @Entity
 */
class PosCustomer
{
    /**
     * @var integer $customerId
     *
     * @Column(name="customer_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $customerId;

    /**
     * @var string $customername
     *
     * @Column(name="customername", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $customername;

    /**
     * @var string $mobileNumber
     *
     * @Column(name="mobile_number", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $mobileNumber;

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
     * @var string $city
     *
     * @Column(name="city", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $city;

    /**
     * @var string $state
     *
     * @Column(name="state", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $state;

    /**
     * @var string $zipCode
     *
     * @Column(name="zip_code", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $zipCode;

    /**
     * @var string $dStreet
     *
     * @Column(name="d_street", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dStreet;

    /**
     * @var string $dCity
     *
     * @Column(name="d_city", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dCity;

    /**
     * @var string $dState
     *
     * @Column(name="d_state", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dState;

    /**
     * @var string $dZipcode
     *
     * @Column(name="d_zipCode", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dZipcode;

    /**
     * @var float $latitude
     *
     * @Column(name="latitude", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $latitude;

    /**
     * @var float $longitude
     *
     * @Column(name="longitude", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $longitude;

    /**
     * @var boolean $status
     *
     * @Column(name="status", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var boolean $deleted
     *
     * @Column(name="deleted", type="boolean", precision=0, scale=0, nullable=false, unique=false)
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
     * @var models\pos\PosGroupCustomer
     *
     * @ManyToOne(targetEntity="models\pos\PosGroupCustomer")
     * @JoinColumns({
     *   @JoinColumn(name="group_customer_customer_group_id", referencedColumnName="customer_group_id", nullable=true)
     * })
     */
    private $groupCustomerCustomerGroup;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $createdBy;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $lastUpdatedBy;


    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set customername
     *
     * @param string $customername
     * @return PosCustomer
     */
    public function setCustomername($customername)
    {
        $this->customername = $customername;
        return $this;
    }

    /**
     * Get customername
     *
     * @return string 
     */
    public function getCustomername()
    {
        return $this->customername;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return PosCustomer
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return PosCustomer
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
     * @return PosCustomer
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
     * Set city
     *
     * @param string $city
     * @return PosCustomer
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
     * Set state
     *
     * @param string $state
     * @return PosCustomer
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
     * @param string $zipCode
     * @return PosCustomer
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set dStreet
     *
     * @param string $dStreet
     * @return PosCustomer
     */
    public function setDStreet($dStreet)
    {
        $this->dStreet = $dStreet;
        return $this;
    }

    /**
     * Get dStreet
     *
     * @return string 
     */
    public function getDStreet()
    {
        return $this->dStreet;
    }

    /**
     * Set dCity
     *
     * @param string $dCity
     * @return PosCustomer
     */
    public function setDCity($dCity)
    {
        $this->dCity = $dCity;
        return $this;
    }

    /**
     * Get dCity
     *
     * @return string 
     */
    public function getDCity()
    {
        return $this->dCity;
    }

    /**
     * Set dState
     *
     * @param string $dState
     * @return PosCustomer
     */
    public function setDState($dState)
    {
        $this->dState = $dState;
        return $this;
    }

    /**
     * Get dState
     *
     * @return string 
     */
    public function getDState()
    {
        return $this->dState;
    }

    /**
     * Set dZipcode
     *
     * @param string $dZipcode
     * @return PosCustomer
     */
    public function setDZipcode($dZipcode)
    {
        $this->dZipcode = $dZipcode;
        return $this;
    }

    /**
     * Get dZipcode
     *
     * @return string 
     */
    public function getDZipcode()
    {
        return $this->dZipcode;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return PosCustomer
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return PosCustomer
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return PosCustomer
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
     * @return PosCustomer
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
     * @return PosCustomer
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
     * @return PosCustomer
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
     * Set groupCustomerCustomerGroup
     *
     * @param models\pos\PosGroupCustomer $groupCustomerCustomerGroup
     * @return PosCustomer
     */
    public function setGroupCustomerCustomerGroup($groupCustomerCustomerGroup = null)
    {
        $this->groupCustomerCustomerGroup = $groupCustomerCustomerGroup;
        return $this;
    }

    /**
     * Get groupCustomerCustomerGroup
     *
     * @return models\pos\PosGroupCustomer 
     */
    public function getGroupCustomerCustomerGroup()
    {
        return $this->groupCustomerCustomerGroup;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosCustomer
     */
    public function setCreatedBy( $createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return models\pos\Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param models\pos\Users $lastUpdatedBy
     * @return PosCustomer
     */
    public function setLastUpdatedBy( $lastUpdatedBy = null)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return models\pos\Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}