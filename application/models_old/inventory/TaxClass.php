<?php



namespace models\inventory;

/**
 * TaxClass
 *
 * @Table(name="tax_class")
 * @Entity
 */
class TaxClass
{
    /**
     * @var integer $taxClassId
     *
     * @Column(name="tax_class_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $taxClassId;

    /**
     * @var string $taxClassName
     *
     * @Column(name="tax_class_name", type="string", length=45, nullable=true)
     */
    private $taxClassName;

    /**
     * @var datetime $createdDate
     *
     * @Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var datetime $lastUpdatedDate
     *
     * @Column(name="last_updated_date", type="datetime", nullable=true)
     */
    private $lastUpdatedDate;

    /**
     * @var integer $lastUpdatedBy
     *
     * @Column(name="last_updated_by", type="integer", nullable=false)
     */
    private $lastUpdatedBy;

    /**
     * @var integer $createdBy
     *
     * @Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;



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
     * @return TaxClass
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
     * Set createdDate
     *
     * @param datetime $createdDate
     * @return TaxClass
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set lastUpdatedDate
     *
     * @param datetime $lastUpdatedDate
     * @return TaxClass
     */
    public function setLastUpdatedDate($lastUpdatedDate)
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
        return $this;
    }

    /**
     * Get lastUpdatedDate
     *
     * @return datetime 
     */
    public function getLastUpdatedDate()
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set lastUpdatedBy
     *
     * @param integer $lastUpdatedBy
     * @return TaxClass
     */
    public function setLastUpdatedBy($lastUpdatedBy)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return integer 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return TaxClass
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}