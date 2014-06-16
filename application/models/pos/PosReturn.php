<?php

namespace models\pos;


/**
 * models\pos\PosReturn
 *
 * @Table(name="pos_return")
 * @Entity
 */
class PosReturn
{
    /**
     * @var integer $returnId
     *
     * @Column(name="return_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $returnId;

    /**
     * @var integer $quantity
     *
     * @Column(name="quantity", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $quantity;

    /**
     * @var float $tax
     *
     * @Column(name="tax", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $tax;

    /**
     * @var float $amount
     *
     * @Column(name="amount", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $amount;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=true, unique=false)
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
     * Get returnId
     *
     * @return integer 
     */
    public function getReturnId()
    {
        return $this->returnId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return PosReturn
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
     * Set tax
     *
     * @param float $tax
     * @return PosReturn
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * Get tax
     *
     * @return float 
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return PosReturn
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
     * @return PosReturn
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
     * @return PosReturn
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
     * @return PosReturn
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