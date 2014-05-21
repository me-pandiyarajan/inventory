<?php



namespace models\inventory;

/**
 * NewOrder
 *
 * @Table(name="new_order")
 * @Entity
 */
class NewOrder
{
    /**
     * @var integer $orderId
     *
     * @Column(name="order_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @var string $orderName
     *
     * @Column(name="order_name", type="string", length=45, nullable=true)
     */
    private $orderName;

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
     * @var string $orderComments
     *
     * @Column(name="order_comments", type="string", length=45, nullable=true)
     */
    private $orderComments;

    /**
     * @var integer $deliveryStatus
     *
     * @Column(name="delivery_status", type="integer", nullable=true)
     */
    private $deliveryStatus;

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
     * Set createdDate
     *
     * @param datetime $createdDate
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
     * @return datetime 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
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
     * Set estimate
     *
     * @param NewEstimation $estimate
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
     * @return Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}