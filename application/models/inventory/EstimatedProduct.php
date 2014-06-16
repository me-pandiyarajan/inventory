<?php

namespace models\inventory;


/**
 * models\inventory\EstimatedProduct
 *
 * @Table(name="estimated_product")
 * @Entity
 */
class EstimatedProduct
{
    /**
     * @var integer $tempProductId
     *
     * @Column(name="temp_product_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $tempProductId;

    /**
     * @var string $productName
     *
     * @Column(name="product_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $productName;

    /**
     * @var string $quantity
     *
     * @Column(name="quantity", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $quantity;

    /**
     * @var string $designName
     *
     * @Column(name="design_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $designName;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string $dimensions
     *
     * @Column(name="dimensions", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dimensions;

    /**
     * @var boolean $ifref
     *
     * @Column(name="Ifref", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $ifref;

    /**
     * @var integer $deliveryQuality
     *
     * @Column(name="Delivery_Quality", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $deliveryQuality;

    /**
     * @var integer $damagedQuality
     *
     * @Column(name="Damaged_Quality", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $damagedQuality;

    /**
     * @var string $deliveryComments
     *
     * @Column(name="Delivery_Comments", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $deliveryComments;

    /**
     * @var integer $orderProduct
     *
     * @Column(name="order_product", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $orderProduct;

    /**
     * @var integer $deliveryStatus
     *
     * @Column(name="delivery_status", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $deliveryStatus;

    /**
     * @var string $productSku
     *
     * @Column(name="product_sku", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $productSku;

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
     * @var models\inventory\NewEstimation
     *
     * @ManyToOne(targetEntity="models\inventory\NewEstimation")
     * @JoinColumns({
     *   @JoinColumn(name="new_estimation_estimate_id", referencedColumnName="estimate_id", nullable=true)
     * })
     */
    private $newEstimationEstimate;

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
     * Set productSku
     *
     * @param string $productSku
     * @return EstimatedProduct
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;
        return $this;
    }

    /**
     * Get productSku
     *
     * @return string 
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
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
     * @return integer 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set newEstimationEstimate
     *
     * @param models\inventory\NewEstimation $newEstimationEstimate
     * @return EstimatedProduct
     */
    public function setNewEstimationEstimate($newEstimationEstimate = null)
    {
        $this->newEstimationEstimate = $newEstimationEstimate;
        return $this;
    }

    /**
     * Get newEstimationEstimate
     *
     * @return models\inventory\NewEstimation 
     */
    public function getNewEstimationEstimate()
    {
        return $this->newEstimationEstimate;
    }

    /**
     * Set createdBy
     *
     * @param models\inventory\Users $createdBy
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
     * @return models\inventory\Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}