<?php

namespace models\pos;


/**
 * models\pos\PosPaymentslipProducts
 *
 * @Table(name="pos_paymentslip_products")
 * @Entity
 */
class PosPaymentslipProducts
{
    /**
     * @var integer $paymentslipProductsId
     *
     * @Column(name="paymentslip_products_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $paymentslipProductsId;

    /**
     * @var models\pos\PosProductSales
     *
     * @ManyToOne(targetEntity="models\pos\PosProductSales")
     * @JoinColumns({
     *   @JoinColumn(name="pos_product_sales_productSalesId", referencedColumnName="productSalesId", nullable=true)
     * })
     */
    private $posProductSalesProductsalesid;

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
     * Get paymentslipProductsId
     *
     * @return integer 
     */
    public function getPaymentslipProductsId()
    {
        return $this->paymentslipProductsId;
    }

    /**
     * Set posProductSalesProductsalesid
     *
     * @param models\pos\PosProductSales $posProductSalesProductsalesid
     * @return PosPaymentslipProducts
     */
    public function setPosProductSalesProductsalesid($posProductSalesProductsalesid = null)
    {
        $this->posProductSalesProductsalesid = $posProductSalesProductsalesid;
        return $this;
    }

    /**
     * Get posProductSalesProductsalesid
     *
     * @return models\pos\PosProductSales 
     */
    public function getPosProductSalesProductsalesid()
    {
        return $this->posProductSalesProductsalesid;
    }

    /**
     * Set posPaymentSlipPaymentslipid
     *
     * @param models\pos\PosPaymentSlip $posPaymentSlipPaymentslipid
     * @return PosPaymentslipProducts
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
}