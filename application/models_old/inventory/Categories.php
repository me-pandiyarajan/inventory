<?php



namespace models\inventory;

/**
 * Categories
 *
 * @Table(name="categories")
 * @Entity
 */
class Categories
{
    /**
     * @var integer $categoryId
     *
     * @Column(name="category_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId;

    /**
     * @var string $categoryName
     *
     * @Column(name="category_name", type="string", length=45, nullable=true)
     */
    private $categoryName;

    /**
     * @var string $comments
     *
     * @Column(name="comments", type="string", length=45, nullable=true)
     */
    private $comments;

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
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    /**
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id")
     * })
     */
    private $lastUpdatedBy;



    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     * @return Categories
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Categories
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     * @return Categories
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
     * @return Categories
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
     * Set createdBy
     *
     * @param Users $createdBy
     * @return Categories
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

    /**
     * Set lastUpdatedBy
     *
     * @param Users $lastUpdatedBy
     * @return Categories
     */
    public function setLastUpdatedBy($lastUpdatedBy = null)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
        return $this;
    }

    /**
     * Get lastUpdatedBy
     *
     * @return Users 
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }
}