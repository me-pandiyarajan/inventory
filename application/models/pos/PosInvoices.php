<?php

namespace models\pos;


/**
 * models\pos\PosInvoices
 *
 * @Table(name="pos_invoices")
 * @Entity
 */
class PosInvoices
{
    /**
     * @var integer $invoiceid
     *
     * @Column(name="invoiceId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $invoiceid;

    /**
     * @var string $invoice_number
     *
     * @Column(name="invoice_number", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $invoiceNumber;

    
    /**
     * @var boolean $transacMode
     *
     * @Column(name="transac_mode", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $transacMode;

    /**
     * @var integer $tenderedby
     *
     * @Column(name="tenderedBy", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tenderedby;

    /**
     * @var boolean $paymentStatus
     *
     * @Column(name="payment_status", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $paymentStatus;

    /**
     * @var boolean $specialInstructions
     *
     * @Column(name="special_Instructions", type="boolean", precision=0, scale=0, nullable=false, unique=false)
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
     * @var integer $lastUpdatedDate
     *
     * @Column(name="last_updated_date", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastUpdatedDate;

    /**
     * @var models\pos\PosCustomer
     *
     * @ManyToOne(targetEntity="models\pos\PosCustomer")
     * @JoinColumns({
     *   @JoinColumn(name="pos_customer_customer_id", referencedColumnName="customer_id", nullable=true)
     * })
     */
    private $posCustomerCustomer;

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
     * Get invoiceid
     *
     * @return integer 
     */
    public function getInvoiceid()
    {
        return $this->invoiceid;
    }

    /**
     * Set invoiceNumber
     *
     * @param string $invoiceNumber
     * @return PosInvoices
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * Get invoiceNumber
     *
     * @return string 
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Set transacMode
     *
     * @param boolean $transacMode
     * @return PosInvoices
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
     * @param integer $tenderedby
     * @return PosInvoices
     */
    public function setTenderedby($tenderedby)
    {
        $this->tenderedby = $tenderedby;
        return $this;
    }

    /**
     * Get tenderedby
     *
     * @return integer 
     */
    public function getTenderedby()
    {
        return $this->tenderedby;
    }

    /**
     * Set paymentStatus
     *
     * @param boolean $paymentStatus
     * @return PosInvoices
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return boolean 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Set specialInstructions
     *
     * @param boolean $specialInstructions
     * @return PosInvoices
     */
    public function setSpecialInstructions($specialInstructions)
    {
        $this->specialInstructions = $specialInstructions;
        return $this;
    }

    /**
     * Get specialInstructions
     *
     * @return boolean 
     */
    public function getSpecialInstructions()
    {
        return $this->specialInstructions;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return PosInvoices
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
     * @return PosInvoices
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
     * @return PosInvoices
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
     * Set posCustomerCustomer
     *
     * @param models\pos\PosCustomer $posCustomerCustomer
     * @return PosInvoices
     */
    public function setPosCustomerCustomer($posCustomerCustomer = null)
    {
        $this->posCustomerCustomer = $posCustomerCustomer;
        return $this;
    }

    /**
     * Get posCustomerCustomer
     *
     * @return models\pos\PosCustomer 
     */
    public function getPosCustomerCustomer()
    {
        return $this->posCustomerCustomer;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosInvoices
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
     * @return PosInvoices
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