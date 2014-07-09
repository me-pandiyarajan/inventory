<?php

namespace models\pos_ws;


/**
 * models\pos_ws\PosWsEnquiry
 *
 * @Table(name="pos_ws_enquiry")
 * @Entity
 */
class PosWsEnquiry
{
    /**
     * @var integer $enquiryid
     *
     * @Column(name="enquiryId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $enquiryid;

    /**
     * @var integer $amountCollected
     *
     * @Column(name="amount_collected", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $amountCollected;

    /**
     * @var integer $appointmentDate
     *
     * @Column(name="appointment_date", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $appointmentDate;

    /**
     * @var integer $productType
     *
     * @Column(name="product_type", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $productType;

    /**
     * @var datetime $checkin
     *
     * @Column(name="checkin", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $checkin;

    /**
     * @var datetime $checkout
     *
     * @Column(name="checkout", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $checkout;

    /**
     * @var string $workDescription
     *
     * @Column(name="work_description", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $workDescription;

    /**
     * @var string $problem
     *
     * @Column(name="problem", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $problem;
     
     
    /**
     * @var models\pos\PosCustomer
     *
     * @ManyToOne(targetEntity="models\pos\PosCustomer")
     * @JoinColumns({
     *   @JoinColumn(name="pos_customer_customer_id", referencedColumnName="customer_id", nullable=true)
     * })
     */
    private $posCustomerCustomer;

    /**
     * @var string $customerSignature
     *
     * @Column(name="customer_signature", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $customerSignature;

       /**
     * @var integer $status
     *
     * @Column(name="status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdDate;

    /**
     * @var integer $lastUpdatedDate
     *
     * @Column(name="last_updated_date", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastUpdatedDate;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="assigned_marketing_rep", referencedColumnName="id", nullable=true)
     * })
     */
    private $assignedMarketingRep;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="assigned_supervisor", referencedColumnName="id", nullable=true)
     * })
     */
    private $assignedSupervisor;

    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="assigned_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $assignedBy;

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
     * @var models\pos\PosProjects
     *
     * @ManyToOne(targetEntity="models\pos\PosProjects")
     * @JoinColumns({
     *   @JoinColumn(name="pos_projects_projectId", referencedColumnName="projectId", nullable=true)
     * })
     */
	private $posProjectsProjectid;
	
    /**
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $lastUpdatedBy;

    

    /**
     * Get enquiryid
     *
     * @return integer 
     */
    public function getEnquiryid()
    {
        return $this->enquiryid;
    }

    /**
     * Set amountCollected
     *
     * @param integer $amountCollected
     * @return PosWsEnquiry
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
     * Set appointmentDate
     *
     * @param integer $appointmentDate
     * @return PosWsEnquiry
     */
    public function setAppointmentDate($appointmentDate)
    {
        $this->appointmentDate = $appointmentDate;
        return $this;
    }

    /**
     * Get appointmentDate
     *
     * @return integer 
     */
    public function getAppointmentDate()
    {
        return $this->appointmentDate;
    }

    /**
     * Set productType
     *
     * @param integer $productType
     * @return PosWsEnquiry
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * Get productType
     *
     * @return integer 
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Set checkin
     *
     * @param datetime $checkin
     * @return PosWsEnquiry
     */
    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;
        return $this;
    }

    /**
     * Get checkin
     *
     * @return datetime 
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * Set checkout
     *
     * @param datetime $checkout
     * @return PosWsEnquiry
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;
        return $this;
    }

    /**
     * Get checkout
     *
     * @return datetime 
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * Set workDescription
     *
     * @param string $workDescription
     * @return PosWsEnquiry
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
     * @return PosWsEnquiry
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
     * Set posCustomerCustomer
     *
     * @param models\pos\PosCustomer $posCustomerCustomer
     * @return PosInvoices
     */
    public function setPosCustomerCustomer($posCustomerCustomer = null)
    {
        $this->posCustomerCustomer = $posCustomerCustomer;
        return $this;
    }

    /**
     * Get posCustomerCustomer
     *
     * @return models\pos\PosCustomer 
     */
    public function getPosCustomerCustomer()
    {
        return $this->posCustomerCustomer;
    }

    
    /**
     * Set customerSignature
     *
     * @param string $customerSignature
     * @return PosWsEnquiry
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
     * Set imageProof
     *
     * @param string $imageProof
     * @return PosWsEnquiry
     */
    public function setImageProof($imageProof)
    {
        $this->imageProof = $imageProof;
        return $this;
    }

    /**
     * Get imageProof
     *
     * @return string 
     */
    public function getImageProof()
    {
        return $this->imageProof;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return PosWsEnquiry
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosWsEnquiry
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
     * Set lastUpdatedDate
     *
     * @param integer $lastUpdatedDate
     * @return PosWsEnquiry
     */
    public function setLastUpdatedDate($lastUpdatedDate)
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
        return $this;
    }

    /**
     * Get lastUpdatedDate
     *
     * @return integer 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set assignedMarketingRep
     *
     * @param models\inventory\Users $assignedMarketingRep
     * @return PosWsEnquiry
     */
    public function setAssignedMarketingRep($assignedMarketingRep = null)
    {
        $this->assignedMarketingRep = $assignedMarketingRep;
        return $this;
    }

    /**
     * Get assignedMarketingRep
     *
     * @return models\inventory\Users 
     */
    public function getAssignedMarketingRep()
    {
        return $this->assignedMarketingRep;
    }

    /**
     * Set assignedSupervisor
     *
     * @param models\inventory\Users $assignedSupervisor
     * @return PosWsEnquiry
     */
    public function setAssignedSupervisor($assignedSupervisor = null)
    {
        $this->assignedSupervisor = $assignedSupervisor;
        return $this;
    }

    /**
     * Get assignedSupervisor
     *
     * @return models\inventory\Users 
     */
    public function getAssignedSupervisor()
    {
        return $this->assignedSupervisor;
    }

    /**
     * Set assignedBy
     *
     * @param models\inventory\Users $assignedBy
     * @return PosWsEnquiry
     */
    public function setAssignedBy($assignedBy = null)
    {
        $this->assignedBy = $assignedBy;
        return $this;
    }

    /**
     * Get assignedBy
     *
     * @return models\inventory\Users 
     */
    public function getAssignedBy()
    {
        return $this->assignedBy;
    }

    /**
     * Set createdBy
     *
     * @param models\inventory\Users $createdBy
     * @return PosWsEnquiry
     */
    public function setCreatedBy($createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return models\inventory\Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    
	 /**
     * Set posProjectsProjectid
     *
     * @param models\pos\PosProjects $posProjectsProjectid
     * @return PosEstimates
     */
    public function setPosProjectsProjectid($posProjectsProjectid = null)
    {
        $this->posProjectsProjectid = $posProjectsProjectid;
        return $this;
    }

    /**
     * Get posProjectsProjectid
     *
     * @return models\pos\PosProjects 
     */
    public function getPosProjectsProjectid()
    {
        return $this->posProjectsProjectid;
    } 
	
    /**
     * Set lastUpdatedBy
     *
     * @param models\inventory\Users $lastUpdatedBy
     * @return PosWsEnquiry
     */
    public function setLastUpdatedBy($lastUpdatedBy = null)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return models\inventory\Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }

   
   

}