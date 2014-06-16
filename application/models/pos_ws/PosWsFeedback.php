<?php

namespace models\posws;


/**
 * models\inventory\PosWsFeedback
 *
 * @Table(name="pos_ws_feedback")
 * @Entity
 */
class PosWsFeedback
{
    /**
     * @var integer $feedbackid
     *
     * @Column(name="feedbackid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $feedbackid;

    /**
     * @var string $comments
     *
     * @Column(name="comments", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $comments;

    /**
     * @var string $satisfactoryLevel
     *
     * @Column(name="satisfactory_level", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $satisfactoryLevel;

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
     * @var models\inventory\PosCustomer
     *
     * @ManyToOne(targetEntity="models\inventory\PosCustomer")
     * @JoinColumns({
     *   @JoinColumn(name="pos_customer_customer_id", referencedColumnName="customer_id", nullable=true)
     * })
     */
    private $posCustomerCustomer;


    /**
     * Get feedbackid
     *
     * @return integer 
     */
    public function getFeedbackid()
    {
        return $this->feedbackid;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return PosWsFeedback
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set satisfactoryLevel
     *
     * @param string $satisfactoryLevel
     * @return PosWsFeedback
     */
    public function setSatisfactoryLevel($satisfactoryLevel)
    {
        $this->satisfactoryLevel = $satisfactoryLevel;
        return $this;
    }

    /**
     * Get satisfactoryLevel
     *
     * @return string 
     */
    public function getSatisfactoryLevel()
    {
        return $this->satisfactoryLevel;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosWsFeedback
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
     * @return PosWsFeedback
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
     * @param models\inventory\Users $createdBy
     * @return PosWsFeedback
     */
    public function setCreatedBy(\models\inventory\Users $createdBy = null)
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
     * @return PosWsFeedback
     */
    public function setLastUpdatedBy(\models\inventory\Users $lastUpdatedBy = null)
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

    /**
     * Set posCustomerCustomer
     *
     * @param models\inventory\PosCustomer $posCustomerCustomer
     * @return PosWsFeedback
     */
    public function setPosCustomerCustomer(\models\inventory\PosCustomer $posCustomerCustomer = null)
    {
        $this->posCustomerCustomer = $posCustomerCustomer;
        return $this;
    }

    /**
     * Get posCustomerCustomer
     *
     * @return models\inventory\PosCustomer 
     */
    public function getPosCustomerCustomer()
    {
        return $this->posCustomerCustomer;
    }
}