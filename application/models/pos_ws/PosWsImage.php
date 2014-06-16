<?php

namespace models\posws;


/**
 * models\inventory\PosWsImage
 *
 * @Table(name="pos_ws_image")
 * @Entity
 */
class PosWsImage
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $image
     *
     * @Column(name="image", type="string", length=225, precision=0, scale=0, nullable=false, unique=false)
     */
    private $image;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return PosWsImage
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set posWsEnquiryEnquiryid
     *
     * @param models\inventory\PosWsEnquiry $posWsEnquiryEnquiryid
     * @return PosWsImage
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
}