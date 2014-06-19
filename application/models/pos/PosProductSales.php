<?php

namespace models\pos;


/**
 * models\pos\PosProductSales
 *
 * @Table(name="pos_product_sales")
 * @Entity
 */
class PosProductSales
{
    /**
     * @var integer $productsalesid
     *
     * @Column(name="productSalesId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $productsalesid;

    /**
     * @var integer $quantity
     *
     * @Column(name="quantity", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $quantity;

    /**
     * @var float $unitPrice
     *
     * @Column(name="unit_price", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitPrice;

    /**
     * @var float $discount
     *
     * @Column(name="discount", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $discount;

    /**
     * @var float $tax
     *
     * @Column(name="tax", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $tax;

    /**
     * @var float $amount
     *
     * @Column(name="amount", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdDate;

    /**
     * @var models\pos\PosInvoices
     *
     * @ManyToOne(targetEntity="models\pos\PosInvoices")
     * @JoinColumns({
     *   @JoinColumn(name="invoices_invoiceId", referencedColumnName="invoiceId", nullable=true)
     * })
     */
    private $invoicesInvoiceid;

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
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $createdBy;


    /**
     * Get productsalesid
     *
     * @return integer 
     */
    public function getProductsalesid()
    {
        return $this->productsalesid;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return PosProductSales
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
     * Set unitPrice
     *
     * @param float $unitPrice
     * @return PosProductSales
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return PosProductSales
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
     * Set tax
     *
     * @param float $tax
     * @return PosProductSales
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
     * @return PosProductSales
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
     * @return PosProductSales
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
     * Set invoicesInvoiceid
     *
     * @param models\pos\PosInvoices $invoicesInvoiceid
     * @return PosProductSales
     */
    public function setInvoicesInvoiceid($invoicesInvoiceid = null)
    {
        $this->invoicesInvoiceid = $invoicesInvoiceid;
        return $this;
    }

    /**
     * Get invoicesInvoiceid
     *
     * @return models\pos\PosInvoices 
     */
    public function getInvoicesInvoiceid()
    {
        return $this->invoicesInvoiceid;
    }

    /**
     * Set productsProductGen
     *
     * @param models\inventory\Products $productsProductGen
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
     * @return models\inventory\Products 
     */
    public function getProductsProductGen()
    {
        return $this->productsProductGen;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosProductSales
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