<?php

namespace models\inventory;


/**
 * models\inventory\NewOrder
 *
 * @Table(name="new_order")
 * @Entity
 */
class NewOrder
{
    /**
     * @var integer $orderId
     *
     * @Column(name="order_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @var string $orderName
     *
     * @Column(name="order_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $orderName;

    /**
     * @var string $orderComments
     *
     * @Column(name="order_comments", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $orderComments;

    /**
     * @var integer $deliveryStatus
     *
     * @Column(name="delivery_status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $deliveryStatus;

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
     *   @JoinColumn(name="estimate_id", referencedColumnName="estimate_id", nullable=true)
     * })
     */
    private $estimate;

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
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set orderName
     *
     * @param string $orderName
     * @return NewOrder
     */
    public function setOrderName($orderName)
    {
        $this->orderName = $orderName;
        return $this;
    }

    /**
     * Get orderName
     *
     * @return string 
     */
    public function getOrderName()
    {
        return $this->orderName;
    }

    /**
     * Set orderComments
     *
     * @param string $orderComments
     * @return NewOrder
     */
    public function setOrderComments($orderComments)
    {
        $this->orderComments = $orderComments;
        return $this;
    }

    /**
     * Get orderComments
     *
     * @return string 
     */
    public function getOrderComments()
    {
        return $this->orderComments;
    }

    /**
     * Set deliveryStatus
     *
     * @param integer $deliveryStatus
     * @return NewOrder
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
     * Set createdDate
     *
     * @param integer $createdDate
     * @return NewOrder
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
     * @return NewOrder
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
     * Set estimate
     *
     * @param models\inventory\NewEstimation $estimate
     * @return NewOrder
     */
    public function setEstimate($estimate = null)
    {
        $this->estimate = $estimate;
        return $this;
    }

    /**
     * Get estimate
     *
     * @return models\inventory\NewEstimation 
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Set createdBy
     *
     * @param models\inventory\Users $createdBy
     * @return NewOrder
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
     * @return NewOrder
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