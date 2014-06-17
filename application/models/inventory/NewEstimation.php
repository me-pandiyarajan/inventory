<?php

namespace models\inventory;


/**
 * models\inventory\NewEstimation
 *
 * @Table(name="new_estimation")
 * @Entity
 */
class NewEstimation
{
    /**
     * @var integer $estimateId
     *
     * @Column(name="estimate_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $estimateId;

    /**
     * @var string $estimateName
     *
     * @Column(name="estimate_name", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $estimateName;

    /**
     * @var integer $estimateNoProduct
     *
     * @Column(name="estimate_no_product", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $estimateNoProduct;

    /**
     * @var integer $status
     *
     * @Column(name="status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var integer $flag
     *
     * @Column(name="flag", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $flag;

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
     * @var models\inventory\Suppliers
     *
     * @ManyToOne(targetEntity="models\inventory\Suppliers")
     * @JoinColumns({
     *   @JoinColumn(name="supplier_id", referencedColumnName="supplier_id", nullable=true)
     * })
     */
    private $supplier;

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
     * Get estimateId
     *
     * @return integer 
     */
    public function getEstimateId()
    {
        return $this->estimateId;
    }

    /**
     * Set estimateName
     *
     * @param string $estimateName
     * @return NewEstimation
     */
    public function setEstimateName($estimateName)
    {
        $this->estimateName = $estimateName;
        return $this;
    }

    /**
     * Get estimateName
     *
     * @return string 
     */
    public function getEstimateName()
    {
        return $this->estimateName;
    }

    /**
     * Set estimateNoProduct
     *
     * @param integer $estimateNoProduct
     * @return NewEstimation
     */
    public function setEstimateNoProduct($estimateNoProduct)
    {
        $this->estimateNoProduct = $estimateNoProduct;
        return $this;
    }

    /**
     * Get estimateNoProduct
     *
     * @return integer 
     */
    public function getEstimateNoProduct()
    {
        return $this->estimateNoProduct;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return NewEstimation
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set flag
     *
     * @param integer $flag
     * @return NewEstimation
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this;
    }

    /**
     * Get flag
     *
     * @return integer 
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return NewEstimation
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
     * @return NewEstimation
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
     * Set supplier
     *
     * @param models\inventory\Suppliers $supplier
     * @return NewEstimation
     */
    public function setSupplier($supplier = null)
    {
        $this->supplier = $supplier;
        return $this;
    }

    /**
     * Get supplier
     *
     * @return models\inventory\Suppliers 
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set createdBy
     *
     * @param models\inventory\Users $createdBy
     * @return NewEstimation
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
     * @return NewEstimation
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