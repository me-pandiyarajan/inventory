<?php



namespace models\inventory;

/**
 * GroupCustomer
 *
 * @Table(name="group_customer")
 * @Entity
 */
class GroupCustomer
{
    /**
     * @var integer $customerGroupId
     *
     * @Column(name="customer_group_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $customerGroupId;

    /**
     * @var string $customerGroupName
     *
     * @Column(name="customer_group_name", type="string", length=45, nullable=true)
     */
    private $customerGroupName;

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
     * Get customerGroupId
     *
     * @return integer 
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * Set customerGroupName
     *
     * @param string $customerGroupName
     * @return GroupCustomer
     */
    public function setCustomerGroupName($customerGroupName)
    {
        $this->customerGroupName = $customerGroupName;
        return $this;
    }

    /**
     * Get customerGroupName
     *
     * @return string 
     */
    public function getCustomerGroupName()
    {
        return $this->customerGroupName;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     * @return GroupCustomer
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
     * @return GroupCustomer
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
     * @param Users $createdBy
     * @return GroupCustomer
     */
    public function setCreatedBy(\Users $createdBy = null)
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
     * @return GroupCustomer
     */
    public function setLastUpdatedBy(\Users $lastUpdatedBy = null)
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