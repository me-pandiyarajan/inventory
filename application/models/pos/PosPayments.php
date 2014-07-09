<?php

namespace models\pos;

/**
 * models\pos\PosPayments
 *
 * @Table(name="pos_payments")
 * @Entity
 */
class PosPayments
{
    /**
     * @var integer $paymentid
     *
     * @Column(name="paymentId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $paymentid;

    /**
     * @var float $amountPaid
     *
     * @Column(name="amount_paid", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $amountPaid;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdDate;

    /**
     * @var models\pos\PosPaymentSlip
     *
     * @ManyToOne(targetEntity="models\pos\PosPaymentSlip")
     * @JoinColumns({
     *   @JoinColumn(name="pos_payment_slip_paymentSlipId", referencedColumnName="paymentSlipId", nullable=true)
     * })
     */
    private $posPaymentSlipPaymentslipid;

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
     * Get paymentid
     *
     * @return integer 
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * Set amountPaid
     *
     * @param float $amountPaid
     * @return PosPayments
     */
    public function setAmountPaid($amountPaid)
    {
        $this->amountPaid = $amountPaid;
        return $this;
    }

    /**
     * Get amountPaid
     *
     * @return float 
     */
    public function getAmountPaid()
    {
        return $this->amountPaid;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosPayments
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
     * Set posPaymentSlipPaymentslipid
     *
     * @param models\pos\PosPaymentSlip $posPaymentSlipPaymentslipid
     * @return PosPayments
     */
    public function setPosPaymentSlipPaymentslipid($posPaymentSlipPaymentslipid = null)
    {
        $this->posPaymentSlipPaymentslipid = $posPaymentSlipPaymentslipid;
        return $this;
    }

    /**
     * Get posPaymentSlipPaymentslipid
     *
     * @return models\pos\PosPaymentSlip 
     */
    public function getPosPaymentSlipPaymentslipid()
    {
        return $this->posPaymentSlipPaymentslipid;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosPayments
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