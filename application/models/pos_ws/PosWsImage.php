<?php

namespace models\pos_ws;


/**
 * models\pos_ws\PosWsImage
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
	 *@var models\pos_ws\PosWsEnquiryCheckList
	 *
     * @var integer $posWsEnquiryCheckListPosWsCheckListId
     *
     * @Column(name="pos_ws_enquiry_check_list_pos_ws_check_list_id", type="integer", nullable=false)
     */
    private $posWsEnquiryCheckListPosWsCheckListId;

	
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
     * Set posWsEnquiryCheckListPosWsCheckListId
     *
     * @param models\pos_ws\PosWsEnquiryCheckList $posWsEnquiryCheckListPosWsCheckListId
     * @return PosWsImage
     */
    public function setPosWsEnquiryCheckListPosWsCheckListId($posWsEnquiryCheckListPosWsCheckListId)
    {
        $this->posWsEnquiryCheckListPosWsCheckListId = $posWsEnquiryCheckListPosWsCheckListId;
        return $this;
    }

    /**
     * Get posWsEnquiryCheckListPosWsCheckListId
     *
     * @return models\pos_ws\PosWsEnquiryCheckList
     */
    public function getPosWsEnquiryCheckListPosWsCheckListId()
    {
        return $this->posWsEnquiryCheckListPosWsCheckListId;
    }
	
}