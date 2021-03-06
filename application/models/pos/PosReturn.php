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
     * @var float $discount
     *
     * @Column(name="discount", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $discount;

    /**
     * @var float $unitprice
     *
     * @Column(name="unitprice", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitprice;

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
     * @var models\inventory\Products
     *
     * @ManyToOne(targetEntity="models\inventory\Products")
     * @JoinColumns({
     *   @JoinColumn(name="products_product_gen_id", referencedColumnName="product_gen_id", nullable=true)
     * })
     */
    private $productsProductGen;

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

   /** Set discount
     *
     * @param float $discount
     * @return PosReturn
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

     /**
     * Set unitprice
     *
     * @param float $unitprice
     * @return PosReturn
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;
        return $this;
    }

    /**
     * Get unitprice
     *
     * @return float 
     */
    public function getUnitprice()
    {
        return $this->unitprice;
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
    /**
     * Set productsProductGen
     *
     * @param models\inventory\Products $productsProductGen
     * @return PosReturn
     */
    public function setProductsProductGen($productsProductGen = null)
    {
        $this->productsProductGen = $productsProductGen;
        return $this;
    }

    /**
     * Get productsProductGen
     *
     * @return models\inventory\Products 
     */
    public function getProductsProductGen()
    {
        return $this->productsProductGen;
    }
}