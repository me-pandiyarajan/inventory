<?php



namespace models\inventory;

/**
 * CategoryDimensions
 *
 * @Table(name="category_dimensions")
 * @Entity
 */
class CategoryDimensions
{
    /**
     * @var integer $dimId
     *
     * @Column(name="dim_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $dimId;

    /**
     * @var string $metrics
     *
     * @Column(name="metrics", type="string", length=45, nullable=true)
     */
    private $metrics;

    /**
     * @var Categories
     *
     * @ManyToOne(targetEntity="Categories")
     * @JoinColumns({
     *   @JoinColumn(name="category_id", referencedColumnName="category_id")
     * })
     */
    private $category;



    /**
     * Get dimId
     *
     * @return integer 
     */
    public function getDimId()
    {
        return $this->dimId;
    }

    /**
     * Set metrics
     *
     * @param string $metrics
     * @return CategoryDimensions
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
        return $this;
    }

    /**
     * Get metrics
     *
     * @return string 
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * Set category
     *
     * @param Categories $category
     * @return CategoryDimensions
     */
    public function setCategory(\Categories $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }
}