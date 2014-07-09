<?php
namespace models\pos_ws;

/**
 * models\pos_ws\PosWsEnquiryProducts
 *
 * @Table(name="pos_ws_enquiry_products")
 * @Entity
 */
class PosWsEnquiryProducts
{
    /**
     * @var integer $enquiryProductId
     *
     * @Column(name="enquiry_product_Id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $enquiryProductId;

    /**
     * @var integer $posWsEnquiryEnquiryid
     *
     * @Column(name="pos_ws_enquiry_enquiryId", type="integer", nullable=false)
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
     * @param integer models\pos_ws\PosWsEnquiry  $posWsEnquiryEnquiryid
     * @return PosWsEnquiryProducts
     */
    public function setPosWsEnquiryEnquiryid($posWsEnquiryEnquiryid)
    {
        $this->posWsEnquiryEnquiryid = $posWsEnquiryEnquiryid;
        return $this;
    }

    /**
     * Get posWsEnquiryEnquiryid
     *
     * @return integer 
     */
    public function getPosWsEnquiryEnquiryid()
    {
        return $this->posWsEnquiryEnquiryid;
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
}