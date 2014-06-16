<?php

namespace models\pos;


/**
 * models\pos\PosGroupCustomer
 *
 * @Table(name="pos_group_customer")
 * @Entity
 */
class PosGroupCustomer
{
    /**
     * @var integer $customerGroupId
     *
     * @Column(name="customer_group_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $customerGroupId;

    /**
     * @var string $customerGroupName
     *
     * @Column(name="customer_group_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $customerGroupName;

    /**
     * @var float $discountPercent
     *
     * @Column(name="discount_percent", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $discountPercent;

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
     * @return PosGroupCustomer
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
     * Set discountPercent
     *
     * @param float $discountPercent
     * @return PosGroupCustomer
     */
    public function setDiscountPercent($discountPercent)
    {
        $this->discountPercent = $discountPercent;
        return $this;
    }

    /**
     * Get discountPercent
     *
     * @return float 
     */
    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return PosGroupCustomer
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
     * @return PosGroupCustomer
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
     * @return PosGroupCustomer
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
     * @return PosGroupCustomer
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
     * @param models\pos\Users $createdBy
     * @return PosGroupCustomer
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
     * @return PosGroupCustomer
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