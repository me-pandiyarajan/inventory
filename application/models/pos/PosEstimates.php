<?php

namespace models\pos;


/**
 * models\pos\PosEstimates
 *
 * @Table(name="pos_estimates")
 * @Entity
 */
class PosEstimates
{
    /**
     * @var integer $estimateid
     *
     * @Column(name="estimateId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $estimateid;

    /**
     * @var string $estimatename
     *
     * @Column(name="estimatename", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $estimatename;

    /**
     * @var string $estimatedescription
     *
     * @Column(name="estimatedescription", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $estimatedescription;

    /**
     * @var integer $status
     *
     * @Column(name="status", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var boolean $isdeleted
     *
     * @Column(name="isDeleted", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $isdeleted;

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
     * @var models\pos\PosCustomer
     *
     * @ManyToOne(targetEntity="models\pos\PosCustomer")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="customer_id", nullable=true)
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
     * Get estimateid
     *
     * @return integer 
     */
    public function getEstimateid()
    {
        return $this->estimateid;
    }

    /**
     * Set estimatename
     *
     * @param string $estimatename
     * @return PosEstimates
     */
    public function setEstimatename($estimatename)
    {
        $this->estimatename = $estimatename;
        return $this;
    }

    /**
     * Get estimatename
     *
     * @return string 
     */
    public function getEstimatename()
    {
        return $this->estimatename;
    }

    /**
     * Set estimatedescription
     *
     * @param string $estimatedescription
     * @return PosEstimates
     */
    public function setEstimatedescription($estimatedescription)
    {
        $this->estimatedescription = $estimatedescription;
        return $this;
    }

    /**
     * Get estimatedescription
     *
     * @return string 
     */
    public function getEstimatedescription()
    {
        return $this->estimatedescription;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return PosEstimates
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
     * Set isdeleted
     *
     * @param boolean $isdeleted
     * @return PosEstimates
     */
    public function setIsdeleted($isdeleted)
    {
        $this->isdeleted = $isdeleted;
        return $this;
    }

    /**
     * Get isdeleted
     *
     * @return boolean 
     */
    public function getIsdeleted()
    {
        return $this->isdeleted;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosEstimates
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
     * @return PosEstimates
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
     * Set createdBy
     *
     * @param models\pos\PosCustomer $createdBy
     * @return PosEstimates
     */
    public function setCreatedBy($createdBy = null)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return models\pos\PosCustomer 
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
     * @param models\pos\Users $lastUpdatedBy
     * @return PosEstimates
     */
    public function setLastUpdatedBy( $lastUpdatedBy = null)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return models\pos\Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}