<?php



namespace models\inventory;

/**
 * Customer
 *
 * @Table(name="customer")
 * @Entity
 */
class Customer
{
    /**
     * @var integer $customerId
     *
     * @Column(name="customer_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $customerId;

    /**
     * @var string $firstName
     *
     * @Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string $lastName
     *
     * @Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=45, nullable=true)
     */
    private $password;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var integer $mobileNumber
     *
     * @Column(name="mobile_number", type="integer", nullable=true)
     */
    private $mobileNumber;

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
     * @var GroupCustomer
     *
     * @ManyToOne(targetEntity="GroupCustomer")
     * @JoinColumns({
     *   @JoinColumn(name="group_customer_customer_group_id", referencedColumnName="customer_group_id")
     * })
     */
    private $groupCustomerCustomerGroup;

    /**
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    /**
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id")
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
     * Set firstName
     *
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
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
     * Set mobileNumber
     *
     * @param integer $mobileNumber
     * @return Customer
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return integer 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * Set groupCustomerCustomerGroup
     *
     * @param GroupCustomer $groupCustomerCustomerGroup
     * @return Customer
     */
    public function setGroupCustomerCustomerGroup(\GroupCustomer $groupCustomerCustomerGroup = null)
    {
        $this->groupCustomerCustomerGroup = $groupCustomerCustomerGroup;
        return $this;
    }

    /**
     * Get groupCustomerCustomerGroup
     *
     * @return GroupCustomer 
     */
    public function getGroupCustomerCustomerGroup()
    {
        return $this->groupCustomerCustomerGroup;
    }

    /**
     * Set createdBy
     *
     * @param Users $createdBy
     * @return Customer
     */
    public function setCreatedBy($createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param Users $lastUpdatedBy
     * @return Customer
     */
    public function setLastUpdatedBy($lastUpdatedBy = null)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}