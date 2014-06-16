<?php

namespace models\pos;


/**
 * models\pos\PosProjects
 *
 * @Table(name="pos_projects")
 * @Entity
 */
class PosProjects
{
    /**
     * @var integer $projectid
     *
     * @Column(name="projectId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $projectid;

    /**
     * @var string $projectName
     *
     * @Column(name="project_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $projectName;

    /**
     * @var string $projectDescription
     *
     * @Column(name="project_description", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $projectDescription;

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
     * @var models\pos\PosInvoices
     *
     * @ManyToOne(targetEntity="models\pos\PosInvoices")
     * @JoinColumns({
     *   @JoinColumn(name="pos_invoices_invoiceId", referencedColumnName="invoiceId", nullable=true)
     * })
     */
    private $posInvoicesInvoiceid;

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
     * @var models\pos\Users
     *
     * @ManyToOne(targetEntity="models\pos\Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $lastUpdatedBy;


    /**
     * Get projectid
     *
     * @return integer 
     */
    public function getProjectid()
    {
        return $this->projectid;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     * @return PosProjects
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set projectDescription
     *
     * @param string $projectDescription
     * @return PosProjects
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;
        return $this;
    }

    /**
     * Get projectDescription
     *
     * @return string 
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return PosProjects
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
     * @return PosProjects
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
     * @return PosProjects
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
     * Set posInvoicesInvoiceid
     *
     * @param models\pos\PosInvoices $posInvoicesInvoiceid
     * @return PosProjects
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
     * Set createdBy
     *
     * @param models\pos\Users $createdBy
     * @return PosProjects
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
     * Set lastUpdatedBy
     *
     * @param models\pos\Users $lastUpdatedBy
     * @return PosProjects
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