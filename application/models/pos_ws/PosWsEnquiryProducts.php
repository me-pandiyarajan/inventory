<?php

namespace models\posws;


/**
 * models\inventory\PosWsEnquiryProducts
 *
 * @Table(name="pos_ws_enquiry_products")
 * @Entity
 */
class PosWsEnquiryProducts
{
    /**
     * @var integer $enquiryProductId
     *
     * @Column(name="enquiry_product_Id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $enquiryProductId;

    /**
     * @var models\inventory\PosWsEnquiry
     *
     * @ManyToOne(targetEntity="models\inventory\PosWsEnquiry")
     * @JoinColumns({
     *   @JoinColumn(name="pos_ws_enquiry_enquiryId", referencedColumnName="enquiryId", nullable=true)
     * })
     */
    private $posWsEnquiryEnquiryid;

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
     * Get enquiryProductId
     *
     * @return integer 
     */
    public function getEnquiryProductId()
    {
        return $this->enquiryProductId;
    }

    /**
     * Set posWsEnquiryEnquiryid
     *
     * @param models\inventory\PosWsEnquiry $posWsEnquiryEnquiryid
     * @return PosWsEnquiryProducts
     */
    public function setPosWsEnquiryEnquiryid(\models\inventory\PosWsEnquiry $posWsEnquiryEnquiryid = null)
    {
        $this->posWsEnquiryEnquiryid = $posWsEnquiryEnquiryid;
        return $this;
    }

    /**
     * Get posWsEnquiryEnquiryid
     *
     * @return models\inventory\PosWsEnquiry 
     */
    public function getPosWsEnquiryEnquiryid()
    {
        return $this->posWsEnquiryEnquiryid;
    }

    /**
     * Set productsProductGen
     *
     * @param models\inventory\Products $productsProductGen
     * @return PosWsEnquiryProducts
     */
    public function setProductsProductGen(\models\inventory\Products $productsProductGen = null)
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