<?php

namespace models\pos;


/**
 * models\pos\PosAdvance
 *
 * @Table(name="pos_advance")
 * @Entity
 */
class PosAdvance
{
    /**
     * @var integer $posAdvanceId
     *
     * @Column(name="pos_advance_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $posAdvanceId;

    /**
     * @var float $amount
     *
     * @Column(name="amount", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $amount;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdDate;

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
     * @var models\pos\PosInvoices
     *
     * @ManyToOne(targetEntity="models\pos\PosInvoices")
     * @JoinColumns({
     *   @JoinColumn(name="pos_invoices_invoiceId", referencedColumnName="invoiceId", nullable=true)
     * })
     */
    private $posInvoicesInvoiceid;


    /**
     * Get posAdvanceId
     *
     * @return integer 
     */
    public function getPosAdvanceId()
    {
        return $this->posAdvanceId;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return PosAdvance
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
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosAdvance
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
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosAdvance
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
     * Set posInvoicesInvoiceid
     *
     * @param models\pos\PosInvoices $posInvoicesInvoiceid
     * @return PosAdvance
     */
    public function setPosInvoicesInvoiceid($posInvoicesInvoiceid = null)
    {
        $this->posInvoicesInvoiceid = $posInvoicesInvoiceid;
        return $this;
    }

    /**
     * Get posInvoicesInvoiceid
     *
     * @return models\pos\PosInvoices 
     */
    public function getPosInvoicesInvoiceid()
    {
        return $this->posInvoicesInvoiceid;
    }
}