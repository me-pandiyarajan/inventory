<?php

namespace models\pos;


/**
 * models\pos\PosEstimateProducts
 *
 * @Table(name="pos_estimate_products")
 * @Entity
 */
class PosEstimateProducts
{
    /**
     * @var integer $estimatedetailsid
     *
     * @Column(name="estimatedetailsId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $estimatedetailsid;

    /**
     * @var integer $quantity
     *
     * @Column(name="quantity", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $quantity;

    /**
     * @var float $amount
     *
     * @Column(name="amount", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $amount;

    /**
     * @var integer $status
     *
     * @Column(name="status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

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
     * @var models\pos\PosEstimates
     *
     * @ManyToOne(targetEntity="models\pos\PosEstimates")
     * @JoinColumns({
     *   @JoinColumn(name="pos_estimates_estimateId", referencedColumnName="estimateId", nullable=true)
     * })
     */
    private $posEstimatesEstimateid;

    /**
     * @var models\pos\Products
     *
     * @ManyToOne(targetEntity="models\pos\Products")
     * @JoinColumns({
     *   @JoinColumn(name="products_product_gen_id", referencedColumnName="product_gen_id", nullable=true)
     * })
     */
    private $productsProductGen;

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
     * Get estimatedetailsid
     *
     * @return integer 
     */
    public function getEstimatedetailsid()
    {
        return $this->estimatedetailsid;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return PosEstimateProducts
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return PosEstimateProducts
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return PosEstimateProducts
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
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosEstimateProducts
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
     * @return PosEstimateProducts
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
     * Set posEstimatesEstimateid
     *
     * @param models\pos\PosEstimates $posEstimatesEstimateid
     * @return PosEstimateProducts
     */
    public function setPosEstimatesEstimateid($posEstimatesEstimateid = null)
    {
        $this->posEstimatesEstimateid = $posEstimatesEstimateid;
        return $this;
    }

    /**
     * Get posEstimatesEstimateid
     *
     * @return models\pos\PosEstimates 
     */
    public function getPosEstimatesEstimateid()
    {
        return $this->posEstimatesEstimateid;
    }

    /**
     * Set productsProductGen
     *
     * @param models\pos\Products $productsProductGen
     * @return PosEstimateProducts
     */
    public function setProductsProductGen($productsProductGen = null)
    {
        $this->productsProductGen = $productsProductGen;
        return $this;
    }

    /**
     * Get productsProductGen
     *
     * @return models\pos\Products 
     */
    public function getProductsProductGen()
    {
        return $this->productsProductGen;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosEstimateProducts
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
     * @return PosEstimateProducts
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