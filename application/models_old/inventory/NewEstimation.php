<?php



namespace models\inventory;

/**
 * NewEstimation
 *
 * @Table(name="new_estimation")
 * @Entity
 */
class NewEstimation
{
    /**
     * @var integer $estimateId
     *
     * @Column(name="estimate_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $estimateId;

    /**
     * @var string $estimateName
     *
     * @Column(name="estimate_name", type="string", length=225, nullable=true)
     */
    private $estimateName;

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
     * @var boolean $status
     *
     * @Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var integer $estimateNoProduct
     *
     * @Column(name="estimate_no_product", type="integer", nullable=true)
     */
    private $estimateNoProduct;

    /**
     * @var integer $createdBy
     *
     * @Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var integer $lastUpdatedBy
     *
     * @Column(name="last_updated_by", type="integer", nullable=true)
     */
    private $lastUpdatedBy;

    /**
     * @var integer $flag
     *
     * @Column(name="flag", type="integer", nullable=false)
     */
    private $flag;

    /**
     * @var Suppliers
     *
     * @ManyToOne(targetEntity="Suppliers")
     * @JoinColumns({
     *   @JoinColumn(name="supplier_id", referencedColumnName="supplier_id")
     * })
     */
    private $supplier;



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
     * Set createdDate
     *
     * @param datetime $createdDate
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
     * @return datetime 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set status
     *
     * @param boolean $status
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
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set createdBy
     *
     * @param integer $createdBy
     * @return NewEstimation
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
     * @return NewEstimation
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
     * Set supplier
     *
     * @param Suppliers $supplier
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
     * @return Suppliers 
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
}