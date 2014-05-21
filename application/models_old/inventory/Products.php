<?php



namespace models\inventory;

/**
 * Products
 *
 * @Table(name="products")
 * @Entity
 */
class Products
{
    /**
     * @var integer $productGenId
     *
     * @Column(name="product_gen_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $productGenId;

    /**
     * @var string $productIdPlu
     *
     * @Column(name="Product_ID_PLU", type="string", length=45, nullable=true)
     */
    private $productIdPlu;

    /**
     * @var string $sku
     *
     * @Column(name="sku", type="string", length=45, nullable=true)
     */
    private $sku;

    /**
     * @var string $barcodeimage
     *
     * @Column(name="barCodeImage", type="string", length=255, nullable=true)
     */
    private $barcodeimage;

    /**
     * @var string $productName
     *
     * @Column(name="product_name", type="string", length=45, nullable=true)
     */
    private $productName;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string $shortDescription
     *
     * @Column(name="short_description", type="string", length=45, nullable=true)
     */
    private $shortDescription;

    /**
     * @var string $status
     *
     * @Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var string $countryOfManufacture
     *
     * @Column(name="country_of_manufacture", type="string", length=45, nullable=true)
     */
    private $countryOfManufacture;

    /**
     * @var float $price
     *
     * @Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var float $groupPrice
     *
     * @Column(name="group_price", type="float", nullable=true)
     */
    private $groupPrice;

    /**
     * @var datetime $specialPriceFrom
     *
     * @Column(name="special_price_from", type="datetime", nullable=true)
     */
    private $specialPriceFrom;

    /**
     * @var datetime $specialPriceTo
     *
     * @Column(name="special_price_to", type="datetime", nullable=true)
     */
    private $specialPriceTo;

    /**
     * @var integer $installationCharges
     *
     * @Column(name="installation_charges", type="integer", nullable=true)
     */
    private $installationCharges;

    /**
     * @var float $totalCost
     *
     * @Column(name="total_cost", type="float", nullable=true)
     */
    private $totalCost;

    /**
     * @var float $grandTotal
     *
     * @Column(name="grand_total", type="float", nullable=true)
     */
    private $grandTotal;

    /**
     * @var string $uploadImage
     *
     * @Column(name="upload_image", type="string", length=100, nullable=true)
     */
    private $uploadImage;

    /**
     * @var integer $quantity
     *
     * @Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var string $unit
     *
     * @Column(name="unit", type="string", length=45, nullable=true)
     */
    private $unit;

    /**
     * @var string $material
     *
     * @Column(name="material", type="string", length=225, nullable=true)
     */
    private $material;

    /**
     * @var boolean $stockAvailability
     *
     * @Column(name="stock_availability", type="boolean", nullable=true)
     */
    private $stockAvailability;

    /**
     * @var integer $safetyStockLevel
     *
     * @Column(name="safety_stock_level", type="integer", nullable=true)
     */
    private $safetyStockLevel;

    /**
     * @var integer $posStockLevel
     *
     * @Column(name="pos_stock_level", type="integer", nullable=true)
     */
    private $posStockLevel;

    /**
     * @var string $dimenUnit
     *
     * @Column(name="dimen_unit", type="string", length=225, nullable=true)
     */
    private $dimenUnit;

    /**
     * @var float $weight
     *
     * @Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var float $width
     *
     * @Column(name="width", type="float", nullable=true)
     */
    private $width;

    /**
     * @var float $length
     *
     * @Column(name="length", type="float", nullable=true)
     */
    private $length;

    /**
     * @var float $height
     *
     * @Column(name="height", type="float", nullable=true)
     */
    private $height;

    /**
     * @var string $designName
     *
     * @Column(name="design_name", type="string", length=45, nullable=true)
     */
    private $designName;

    /**
     * @var string $shade
     *
     * @Column(name="shade", type="string", length=45, nullable=true)
     */
    private $shade;

    /**
     * @var datetime $createdDate
     *
     * @Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var datetime $lastUpdated
     *
     * @Column(name="last_updated", type="datetime", nullable=true)
     */
    private $lastUpdated;

    /**
     * @var datetime $productActivated
     *
     * @Column(name="product_activated", type="datetime", nullable=true)
     */
    private $productActivated;

    /**
     * @var integer $approved
     *
     * @Column(name="approved", type="integer", nullable=true)
     */
    private $approved;

    /**
     * @var datetime $approvedDate
     *
     * @Column(name="approved_date", type="datetime", nullable=true)
     */
    private $approvedDate;

    /**
     * @var integer $createdBy
     *
     * @Column(name="created_by", type="integer", nullable=true)
     */
    private $createdBy;

    /**
     * @var integer $lastUpdatedBy
     *
     * @Column(name="last_updated_by", type="integer", nullable=true)
     */
    private $lastUpdatedBy;

    /**
     * @var integer $approvedBy
     *
     * @Column(name="approved_by", type="integer", nullable=true)
     */
    private $approvedBy;

    /**
     * @var integer $deleted
     *
     * @Column(name="deleted", type="integer", nullable=true)
     */
    private $deleted;

    /**
     * @var Categories
     *
     * @ManyToOne(targetEntity="Categories")
     * @JoinColumns({
     *   @JoinColumn(name="categories_category_id", referencedColumnName="category_id")
     * })
     */
    private $categoriesCategory;

    /**
     * @var Suppliers
     *
     * @ManyToOne(targetEntity="Suppliers")
     * @JoinColumns({
     *   @JoinColumn(name="suppliers_supplier_id", referencedColumnName="supplier_id")
     * })
     */
    private $suppliersSupplier;

    /**
     * @var TaxClass
     *
     * @ManyToOne(targetEntity="TaxClass")
     * @JoinColumns({
     *   @JoinColumn(name="tax_class_tax_class_id", referencedColumnName="tax_class_id")
     * })
     */
    private $taxClassTaxClass;



    /**
     * Get productGenId
     *
     * @return integer 
     */
    public function getProductGenId()
    {
        return $this->productGenId;
    }

    /**
     * Set productIdPlu
     *
     * @param string $productIdPlu
     * @return Products
     */
    public function setProductIdPlu($productIdPlu)
    {
        $this->productIdPlu = $productIdPlu;
        return $this;
    }

    /**
     * Get productIdPlu
     *
     * @return string 
     */
    public function getProductIdPlu()
    {
        return $this->productIdPlu;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Products
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set barcodeimage
     *
     * @param string $barcodeimage
     * @return Products
     */
    public function setBarcodeimage($barcodeimage)
    {
        $this->barcodeimage = $barcodeimage;
        return $this;
    }

    /**
     * Get barcodeimage
     *
     * @return string 
     */
    public function getBarcodeimage()
    {
        return $this->barcodeimage;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return Products
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Products
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Products
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set countryOfManufacture
     *
     * @param string $countryOfManufacture
     * @return Products
     */
    public function setCountryOfManufacture($countryOfManufacture)
    {
        $this->countryOfManufacture = $countryOfManufacture;
        return $this;
    }

    /**
     * Get countryOfManufacture
     *
     * @return string 
     */
    public function getCountryOfManufacture()
    {
        return $this->countryOfManufacture;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set groupPrice
     *
     * @param float $groupPrice
     * @return Products
     */
    public function setGroupPrice($groupPrice)
    {
        $this->groupPrice = $groupPrice;
        return $this;
    }

    /**
     * Get groupPrice
     *
     * @return float 
     */
    public function getGroupPrice()
    {
        return $this->groupPrice;
    }

    /**
     * Set specialPriceFrom
     *
     * @param datetime $specialPriceFrom
     * @return Products
     */
    public function setSpecialPriceFrom($specialPriceFrom)
    {
        $this->specialPriceFrom = $specialPriceFrom;
        return $this;
    }

    /**
     * Get specialPriceFrom
     *
     * @return datetime 
     */
    public function getSpecialPriceFrom()
    {
        return $this->specialPriceFrom;
    }

    /**
     * Set specialPriceTo
     *
     * @param datetime $specialPriceTo
     * @return Products
     */
    public function setSpecialPriceTo($specialPriceTo)
    {
        $this->specialPriceTo = $specialPriceTo;
        return $this;
    }

    /**
     * Get specialPriceTo
     *
     * @return datetime 
     */
    public function getSpecialPriceTo()
    {
        return $this->specialPriceTo;
    }

    /**
     * Set installationCharges
     *
     * @param integer $installationCharges
     * @return Products
     */
    public function setInstallationCharges($installationCharges)
    {
        $this->installationCharges = $installationCharges;
        return $this;
    }

    /**
     * Get installationCharges
     *
     * @return integer 
     */
    public function getInstallationCharges()
    {
        return $this->installationCharges;
    }

    /**
     * Set totalCost
     *
     * @param float $totalCost
     * @return Products
     */
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;
        return $this;
    }

    /**
     * Get totalCost
     *
     * @return float 
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * Set grandTotal
     *
     * @param float $grandTotal
     * @return Products
     */
    public function setGrandTotal($grandTotal)
    {
        $this->grandTotal = $grandTotal;
        return $this;
    }

    /**
     * Get grandTotal
     *
     * @return float 
     */
    public function getGrandTotal()
    {
        return $this->grandTotal;
    }

    /**
     * Set uploadImage
     *
     * @param string $uploadImage
     * @return Products
     */
    public function setUploadImage($uploadImage)
    {
        $this->uploadImage = $uploadImage;
        return $this;
    }

    /**
     * Get uploadImage
     *
     * @return string 
     */
    public function getUploadImage()
    {
        return $this->uploadImage;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Products
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return Products
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set material
     *
     * @param string $material
     * @return Products
     */
    public function setMaterial($material)
    {
        $this->material = $material;
        return $this;
    }

    /**
     * Get material
     *
     * @return string 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set stockAvailability
     *
     * @param boolean $stockAvailability
     * @return Products
     */
    public function setStockAvailability($stockAvailability)
    {
        $this->stockAvailability = $stockAvailability;
        return $this;
    }

    /**
     * Get stockAvailability
     *
     * @return boolean 
     */
    public function getStockAvailability()
    {
        return $this->stockAvailability;
    }

    /**
     * Set safetyStockLevel
     *
     * @param integer $safetyStockLevel
     * @return Products
     */
    public function setSafetyStockLevel($safetyStockLevel)
    {
        $this->safetyStockLevel = $safetyStockLevel;
        return $this;
    }

    /**
     * Get safetyStockLevel
     *
     * @return integer 
     */
    public function getSafetyStockLevel()
    {
        return $this->safetyStockLevel;
    }

    /**
     * Set posStockLevel
     *
     * @param integer $posStockLevel
     * @return Products
     */
    public function setPosStockLevel($posStockLevel)
    {
        $this->posStockLevel = $posStockLevel;
        return $this;
    }

    /**
     * Get posStockLevel
     *
     * @return integer 
     */
    public function getPosStockLevel()
    {
        return $this->posStockLevel;
    }

    /**
     * Set dimenUnit
     *
     * @param string $dimenUnit
     * @return Products
     */
    public function setDimenUnit($dimenUnit)
    {
        $this->dimenUnit = $dimenUnit;
        return $this;
    }

    /**
     * Get dimenUnit
     *
     * @return string 
     */
    public function getDimenUnit()
    {
        return $this->dimenUnit;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return Products
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set width
     *
     * @param float $width
     * @return Products
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Get width
     *
     * @return float 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set length
     *
     * @param float $length
     * @return Products
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Get length
     *
     * @return float 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set height
     *
     * @param float $height
     * @return Products
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get height
     *
     * @return float 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set designName
     *
     * @param string $designName
     * @return Products
     */
    public function setDesignName($designName)
    {
        $this->designName = $designName;
        return $this;
    }

    /**
     * Get designName
     *
     * @return string 
     */
    public function getDesignName()
    {
        return $this->designName;
    }

    /**
     * Set shade
     *
     * @param string $shade
     * @return Products
     */
    public function setShade($shade)
    {
        $this->shade = $shade;
        return $this;
    }

    /**
     * Get shade
     *
     * @return string 
     */
    public function getShade()
    {
        return $this->shade;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     * @return Products
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
     * Set lastUpdated
     *
     * @param datetime $lastUpdated
     * @return Products
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return datetime 
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set productActivated
     *
     * @param datetime $productActivated
     * @return Products
     */
    public function setProductActivated($productActivated)
    {
        $this->productActivated = $productActivated;
        return $this;
    }

    /**
     * Get productActivated
     *
     * @return datetime 
     */
    public function getProductActivated()
    {
        return $this->productActivated;
    }

    /**
     * Set approved
     *
     * @param integer $approved
     * @return Products
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
        return $this;
    }

    /**
     * Get approved
     *
     * @return integer 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set approvedDate
     *
     * @param datetime $approvedDate
     * @return Products
     */
    public function setApprovedDate($approvedDate)
    {
        $this->approvedDate = $approvedDate;
        return $this;
    }

    /**
     * Get approvedDate
     *
     * @return datetime 
     */
    public function getApprovedDate()
    {
        return $this->approvedDate;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Products
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

    /**
     * Set lastUpdatedBy
     *
     * @param integer $lastUpdatedBy
     * @return Products
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
     * Set approvedBy
     *
     * @param integer $approvedBy
     * @return Products
     */
    public function setApprovedBy($approvedBy)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return integer 
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * Set deleted
     *
     * @param integer $deleted
     * @return Products
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * Get deleted
     *
     * @return integer 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set categoriesCategory
     *
     * @param Categories $categoriesCategory
     * @return Products
     */
    public function setCategoriesCategory(\Categories $categoriesCategory = null)
    {
        $this->categoriesCategory = $categoriesCategory;
        return $this;
    }

    /**
     * Get categoriesCategory
     *
     * @return Categories 
     */
    public function getCategoriesCategory()
    {
        return $this->categoriesCategory;
    }

    /**
     * Set suppliersSupplier
     *
     * @param Suppliers $suppliersSupplier
     * @return Products
     */
    public function setSuppliersSupplier(\Suppliers $suppliersSupplier = null)
    {
        $this->suppliersSupplier = $suppliersSupplier;
        return $this;
    }

    /**
     * Get suppliersSupplier
     *
     * @return Suppliers 
     */
    public function getSuppliersSupplier()
    {
        return $this->suppliersSupplier;
    }

    /**
     * Set taxClassTaxClass
     *
     * @param TaxClass $taxClassTaxClass
     * @return Products
     */
    public function setTaxClassTaxClass(\TaxClass $taxClassTaxClass = null)
    {
        $this->taxClassTaxClass = $taxClassTaxClass;
        return $this;
    }

    /**
     * Get taxClassTaxClass
     *
     * @return TaxClass 
     */
    public function getTaxClassTaxClass()
    {
        return $this->taxClassTaxClass;
    }
}