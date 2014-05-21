<?php



namespace models\inventory;

/**
 * EstimatedProduct
 *
 * @Table(name="estimated_product")
 * @Entity
 */
class EstimatedProduct
{
    /**
     * @var integer $tempProductId
     *
     * @Column(name="temp_product_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $tempProductId;

    /**
     * @var string $productName
     *
     * @Column(name="product_name", type="string", length=45, nullable=true)
     */
    private $productName;

    /**
     * @var string $quantity
     *
     * @Column(name="quantity", type="string", length=50, nullable=true)
     */
    private $quantity;

    /**
     * @var string $designName
     *
     * @Column(name="design_name", type="string", length=45, nullable=true)
     */
    private $designName;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string $dimensions
     *
     * @Column(name="dimensions", type="string", length=45, nullable=true)
     */
    private $dimensions;

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
     * @var boolean $ifref
     *
     * @Column(name="Ifref", type="boolean", nullable=true)
     */
    private $ifref;

    /**
     * @var integer $productId
     *
     * @Column(name="product_id", type="integer", nullable=true)
     */
    private $productId;

    /**
     * @var integer $deliveryQuality
     *
     * @Column(name="Delivery_Quality", type="integer", nullable=true)
     */
    private $deliveryQuality;

    /**
     * @var integer $damagedQuality
     *
     * @Column(name="Damaged_Quality", type="integer", nullable=true)
     */
    private $damagedQuality;

    /**
     * @var string $deliveryComments
     *
     * @Column(name="Delivery_Comments", type="string", length=225, nullable=true)
     */
    private $deliveryComments;

    /**
     * @var integer $orderProduct
     *
     * @Column(name="order_product", type="integer", nullable=false)
     */
    private $orderProduct;

    /**
     * @var integer $deliveryStatus
     *
     * @Column(name="delivery_status", type="integer", nullable=false)
     */
    private $deliveryStatus;

      /**
     * @var string $productPlu
     *
     * @Column(name="product_sku", type="string", length=225, nullable=false)
     */
    private $productSku;


    /**
     * @var NewEstimation
     *
     * @ManyToOne(targetEntity="NewEstimation")
     * @JoinColumns({
     *   @JoinColumn(name="estimate_id", referencedColumnName="estimate_id")
     * })
     */
    private $estimate;

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
     * Get tempProductId
     *
     * @return integer 
     */
    public function getTempProductId()
    {
        return $this->tempProductId;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return EstimatedProduct
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     * @return EstimatedProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get quantity
     *
     * @return string 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set designName
     *
     * @param string $designName
     * @return EstimatedProduct
     */
    public function setDesignName($designName)
    {
        $this->designName = $designName;
        return $this;
    }

    /**
     * Get designName
     *
     * @return string 
     */
    public function getDesignName()
    {
        return $this->designName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EstimatedProduct
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dimensions
     *
     * @param string $dimensions
     * @return EstimatedProduct
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * Get dimensions
     *
     * @return string 
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     * @return EstimatedProduct
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
     * @return EstimatedProduct
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
     * Set ifref
     *
     * @param boolean $ifref
     * @return EstimatedProduct
     */
    public function setIfref($ifref)
    {
        $this->ifref = $ifref;
        return $this;
    }

    /**
     * Get ifref
     *
     * @return boolean 
     */
    public function getIfref()
    {
        return $this->ifref;
    }

    /**
     * Set productPlu
     *
     * @param string $productPlu
     * @return EstimatedProduct
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;
        return $this;
    }

    /**
     * Get productPlu
     *
     * @return string 
     */
    public function getProductSku()
    {
        return $this->productSku;
    }
    /**
     * Set deliveryQuality
     *
     * @param integer $deliveryQuality
     * @return EstimatedProduct
     */
    public function setDeliveryQuality($deliveryQuality)
    {
        $this->deliveryQuality = $deliveryQuality;
        return $this;
    }

    /**
     * Get deliveryQuality
     *
     * @return integer 
     */
    public function getDeliveryQuality()
    {
        return $this->deliveryQuality;
    }

    /**
     * Set damagedQuality
     *
     * @param integer $damagedQuality
     * @return EstimatedProduct
     */
    public function setDamagedQuality($damagedQuality)
    {
        $this->damagedQuality = $damagedQuality;
        return $this;
    }

    /**
     * Get damagedQuality
     *
     * @return integer 
     */
    public function getDamagedQuality()
    {
        return $this->damagedQuality;
    }

    /**
     * Set deliveryComments
     *
     * @param string $deliveryComments
     * @return EstimatedProduct
     */
    public function setDeliveryComments($deliveryComments)
    {
        $this->deliveryComments = $deliveryComments;
        return $this;
    }

    /**
     * Get deliveryComments
     *
     * @return string 
     */
    public function getDeliveryComments()
    {
        return $this->deliveryComments;
    }

    /**
     * Set orderProduct
     *
     * @param integer $orderProduct
     * @return EstimatedProduct
     */
    public function setOrderProduct($orderProduct)
    {
        $this->orderProduct = $orderProduct;
        return $this;
    }

    /**
     * Get orderProduct
     *
     * @return integer 
     */
    public function getOrderProduct()
    {
        return $this->orderProduct;
    }

    /**
     * Set deliveryStatus
     *
     * @param integer $deliveryStatus
     * @return EstimatedProduct
     */
    public function setDeliveryStatus($deliveryStatus)
    {
        $this->deliveryStatus = $deliveryStatus;
        return $this;
    }

    /**
     * Get deliveryStatus
     *
     * @return integer 
     */
    public function getDeliveryStatus()
    {
        return $this->deliveryStatus;
    }

    /**
     * Set productPlu
     *
     * @param string $productPlu
     * @return EstimatedProduct
     */
    public function setProductPlu($productPlu)
    {
        $this->productPlu = $productPlu;
        return $this;
    }

    /**
     * Get productPlu
     *
     * @return string 
     */
    public function getProductPlu()
    {
        return $this->productPlu;
    }

    /**
     * Set estimate
     *
     * @param NewEstimation $estimate
     * @return EstimatedProduct
     */
    public function setEstimate($estimate = null)
    {
        $this->estimate = $estimate;
        return $this;
    }

    /**
     * Get estimate
     *
     * @return NewEstimation 
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Set createdBy
     *
     * @param Users $createdBy
     * @return EstimatedProduct
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
     * @return EstimatedProduct
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