<?php

namespace models\pos;


/**
 * models\pos\PosPaymentSlip
 *
 * @Table(name="pos_payment_slip")
 * @Entity
 */
class PosPaymentSlip
{
    /**
     * @var integer $paymentslipid
     *
     * @Column(name="paymentSlipId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $paymentslipid;

    /**
     * @var boolean $transacMode
     *
     * @Column(name="transac_mode", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $transacMode;

    /**
     * @var string $tenderedby
     *
     * @Column(name="tenderedBy", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tenderedby;

    /**
     * @var integer $paymentStatus
     *
     * @Column(name="payment_status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $paymentStatus;

    /**
     * @var text $specialInstructions
     *
     * @Column(name="special_Instructions", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $specialInstructions;

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
     * @var models\pos\PosProjects
     *
     * @ManyToOne(targetEntity="models\pos\PosProjects")
     * @JoinColumns({
     *   @JoinColumn(name="pos_projects_projectId", referencedColumnName="projectId", nullable=true)
     * })
     */
    private $posProjectsProjectid;

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
     * Get paymentslipid
     *
     * @return integer 
     */
    public function getPaymentslipid()
    {
        return $this->paymentslipid;
    }

    /**
     * Set transacMode
     *
     * @param boolean $transacMode
     * @return PosPaymentSlip
     */
    public function setTransacMode($transacMode)
    {
        $this->transacMode = $transacMode;
        return $this;
    }

    /**
     * Get transacMode
     *
     * @return boolean 
     */
    public function getTransacMode()
    {
        return $this->transacMode;
    }

    /**
     * Set tenderedby
     *
     * @param string $tenderedby
     * @return PosPaymentSlip
     */
    public function setTenderedby($tenderedby)
    {
        $this->tenderedby = $tenderedby;
        return $this;
    }

    /**
     * Get tenderedby
     *
     * @return string 
     */
    public function getTenderedby()
    {
        return $this->tenderedby;
    }

    /**
     * Set paymentStatus
     *
     * @param integer $paymentStatus
     * @return PosPaymentSlip
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return integer 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Set specialInstructions
     *
     * @param text $specialInstructions
     * @return PosPaymentSlip
     */
    public function setSpecialInstructions($specialInstructions)
    {
        $this->specialInstructions = $specialInstructions;
        return $this;
    }

    /**
     * Get specialInstructions
     *
     * @return text 
     */
    public function getSpecialInstructions()
    {
        return $this->specialInstructions;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return PosPaymentSlip
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
     * @return PosPaymentSlip
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
     * Set posProjectsProjectid
     *
     * @param models\pos\PosProjects $posProjectsProjectid
     * @return PosPaymentSlip
     */
    public function setPosProjectsProjectid($posProjectsProjectid = null)
    {
        $this->posProjectsProjectid = $posProjectsProjectid;
        return $this;
    }

    /**
     * Get posProjectsProjectid
     *
     * @return models\pos\PosProjects 
     */
    public function getPosProjectsProjectid()
    {
        return $this->posProjectsProjectid;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosPaymentSlip
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
}