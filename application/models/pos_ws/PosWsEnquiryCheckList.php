<?php

namespace models\pos_ws;

/**
 * models\pos_ws\PosWsEnquiryCheckList
 *
 * @Table(name="pos_ws_enquiry_check_list")
 * @Entity
 */
class PosWsEnquiryCheckList
{
    /**
     * @var integer $posWsCheckListId
     *
     * @Column(name="pos_ws_check_list_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $posWsCheckListId;

    /**
     * @var integer $checkIn
     *
     * @Column(name="check_in", type="integer", nullable=false)
     */
    private $checkIn;

    /**
     * @var integer $checkOut
     *
     * @Column(name="check_out", type="integer", nullable=false)
     */
    private $checkOut;

    /**
     * @var integer $amountCollected
     *
     * @Column(name="amount_collected", type="integer", nullable=true)
     */
    private $amountCollected;

    /**
     * @var string $checkNumber
     *
     * @Column(name="check_number", type="string", length=45, nullable=true)
     */
    private $checkNumber;

    /**
     * @var string $workDescription
     *
     * @Column(name="work_description", type="string", length=45, nullable=true)
     */
    private $workDescription;

    /**
     * @var string $problem
     *
     * @Column(name="problem", type="string", length=45, nullable=true)
     */
    private $problem;

    /**
     * @var string $customerSignature
     *
     * @Column(name="customer_signature", type="string", length=45, nullable=true)
     */
    private $customerSignature;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", nullable=true)
     */
    private $createdDate;

    /**
     * @var PosWsEnquiry
     *
     * @ManyToOne(targetEntity="PosWsEnquiry")
     * @JoinColumns({
     *   @JoinColumn(name="pos_ws_enquiry_enquiryId", referencedColumnName="enquiryId")
     * })
     */
    private $posWsEnquiryEnquiryid;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;



    /**
     * Get posWsCheckListId
     *
     * @return integer 
     */
    public function getPosWsCheckListId()
    {
        return $this->posWsCheckListId;
    }

    /**
     * Set checkIn
     *
     * @param integer $checkIn
     * @return PosWsEnquiryCheckList
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
        return $this;
    }

    /**
     * Get checkIn
     *
     * @return integer 
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * Set checkOut
     *
     * @param integer $checkOut
     * @return PosWsEnquiryCheckList
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;
        return $this;
    }

    /**
     * Get checkOut
     *
     * @return integer 
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * Set amountCollected
     *
     * @param integer $amountCollected
     * @return PosWsEnquiryCheckList
     */
    public function setAmountCollected($amountCollected)
    {
        $this->amountCollected = $amountCollected;
        return $this;
    }

    /**
     * Get amountCollected
     *
     * @return integer 
     */
    public function getAmountCollected()
    {
        return $this->amountCollected;
    }

    /**
     * Set checkNumber
     *
     * @param string $checkNumber
     * @return PosWsEnquiryCheckList
     */
    public function setCheckNumber($checkNumber)
    {
        $this->checkNumber = $checkNumber;
        return $this;
    }

    /**
     * Get checkNumber
     *
     * @return string 
     */
    public function getCheckNumber()
    {
        return $this->checkNumber;
    }

    /**
     * Set workDescription
     *
     * @param string $workDescription
     * @return PosWsEnquiryCheckList
     */
    public function setWorkDescription($workDescription)
    {
        $this->workDescription = $workDescription;
        return $this;
    }

    /**
     * Get workDescription
     *
     * @return string 
     */
    public function getWorkDescription()
    {
        return $this->workDescription;
    }

    /**
     * Set problem
     *
     * @param string $problem
     * @return PosWsEnquiryCheckList
     */
    public function setProblem($problem)
    {
        $this->problem = $problem;
        return $this;
    }

    /**
     * Get problem
     *
     * @return string 
     */
    public function getProblem()
    {
        return $this->problem;
    }

    /**
     * Set customerSignature
     *
     * @param string $customerSignature
     * @return PosWsEnquiryCheckList
     */
    public function setCustomerSignature($customerSignature)
    {
        $this->customerSignature = $customerSignature;
        return $this;
    }

    /**
     * Get customerSignature
     *
     * @return string 
     */
    public function getCustomerSignature()
    {
        return $this->customerSignature;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosWsEnquiryCheckList
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
     * Set posWsEnquiryEnquiryid
     *
     * @param PosWsEnquiry $posWsEnquiryEnquiryid
     * @return PosWsEnquiryCheckList
     */
    public function setPosWsEnquiryEnquiryid($posWsEnquiryEnquiryid = null)
    {
        $this->posWsEnquiryEnquiryid = $posWsEnquiryEnquiryid;
        return $this;
    }

    /**
     * Get posWsEnquiryEnquiryid
     *
     * @return PosWsEnquiry 
     */
    public function getPosWsEnquiryEnquiryid()
    {
        return $this->posWsEnquiryEnquiryid;
    }

    /**
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosWsEnquiryCheckList
     */
    public function setCreatedBy($createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}