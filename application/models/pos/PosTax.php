<?php

namespace models\pos;


/**
 * models\pos\PosTax
 *
 * @Table(name="pos_tax")
 * @Entity
 */
class PosTax
{
    /**
     * @var integer $taxClassId
     *
     * @Column(name="tax_class_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $taxClassId;

    /**
     * @var string $taxClassName
     *
     * @Column(name="tax_class_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $taxClassName;

    /**
     * @var float $taxPercent
     *
     * @Column(name="tax_percent", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $taxPercent;

    /**
     * @var boolean $status
     *
     * @Column(name="status", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var boolean $deleted
     *
     * @Column(name="deleted", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $deleted;

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
     * Get taxClassId
     *
     * @return integer 
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }

    /**
     * Set taxClassName
     *
     * @param string $taxClassName
     * @return PosTax
     */
    public function setTaxClassName($taxClassName)
    {
        $this->taxClassName = $taxClassName;
        return $this;
    }

    /**
     * Get taxClassName
     *
     * @return string 
     */
    public function getTaxClassName()
    {
        return $this->taxClassName;
    }

    /**
     * Set taxPercent
     *
     * @param float $taxPercent
     * @return PosTax
     */
    public function setTaxPercent($taxPercent)
    {
        $this->taxPercent = $taxPercent;
        return $this;
    }

    /**
     * Get taxPercent
     *
     * @return float 
     */
    public function getTaxPercent()
    {
        return $this->taxPercent;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return PosTax
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return PosTax
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosTax
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
     * @return PosTax
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
     * @param models\pos\Users $createdBy
     * @return PosTax
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
     * @return PosTax
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