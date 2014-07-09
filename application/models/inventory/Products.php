<?php

namespace models\inventory;


/**
 * models\inventory\Products
 *
 * @Table(name="products")
 * @Entity
 */
class Products
{
    /**
     * @var integer $productGenId
     *
     * @Column(name="product_gen_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $productGenId;

    /**
     * @var string $productIdPlu
     *
     * @Column(name="Product_ID_PLU", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $productIdPlu;

    /**
     * @var string $sku
     *
     * @Column(name="sku", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $sku;

    /**
     * @var string $barcodeimage
     *
     * @Column(name="barCodeImage", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $barcodeimage;

    /**
     * @var string $productName
     *
     * @Column(name="product_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $productName;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string $shortDescription
     *
     * @Column(name="short_description", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shortDescription;

    /**
     * @var string $status
     *
     * @Column(name="status", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var string $countryOfManufacture
     *
     * @Column(name="country_of_manufacture", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $countryOfManufacture;

    /**
     * @var float $price
     *
     * @Column(name="price", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $price;

    /**
     * @var integer $specialPriceFrom
     *
     * @Column(name="special_price_from", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $specialPriceFrom;

    /**
     * @var integer $specialPriceTo
     *
     * @Column(name="special_price_to", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $specialPriceTo;

    /**
     * @var integer $installationCharges
     *
     * @Column(name="installation_charges", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $installationCharges;

    /**
     * @var string $uploadImage
     *
     * @Column(name="upload_image", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $uploadImage;

    /**
     * @var integer $quantity
     *
     * @Column(name="quantity", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $quantity;

    /**
     * @var string $unit
     *
     * @Column(name="unit", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unit;

    /**
     * @var string $material
     *
     * @Column(name="material", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $material;

    /**
     * @var boolean $stockAvailability
     *
     * @Column(name="stock_availability", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $stockAvailability;

    /**
     * @var integer $safetyStockLevel
     *
     * @Column(name="safety_stock_level", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $safetyStockLevel;

    /**
     * @var integer $posStockLevel
     *
     * @Column(name="pos_stock_level", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $posStockLevel;

    /**
     * @var string $dimenUnit
     *
     * @Column(name="dimen_unit", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dimenUnit;

    /**
     * @var float $weight
     *
     * @Column(name="weight", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $weight;

    /**
     * @var float $width
     *
     * @Column(name="width", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $width;

    /**
     * @var float $length
     *
     * @Column(name="length", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $length;

    /**
     * @var float $height
     *
     * @Column(name="height", type="float", precision=0, scale=0, nullable=true, unique=false)
     */
    private $height;

    /**
     * @var string $designName
     *
     * @Column(name="design_name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $designName;

    /**
     * @var string $shade
     *
     * @Column(name="shade", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $shade;

    /**
     * @var integer $productActivated
     *
     * @Column(name="product_activated", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $productActivated;

    /**
     * @var integer $approved
     *
     * @Column(name="approved", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $approved;

    /**
     * @var integer $approvedDate
     *
     * @Column(name="approved_date", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $approvedDate;

    /**
     * @var integer $deleted
     *
     * @Column(name="deleted", type="integer", precision=0, scale=0, nullable=true, unique=false)
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
     * @var string $suppplierProductName
     *
     * @Column(name="suppplier_product_name", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $suppplierProductName;

    /**
     * @var string $supplierDesignName
     *
     * @Column(name="supplier_design_name", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $supplierDesignName;


     /**
     * @var string $supplierShadeName
     *
     * @Column(name="supplier_shade_name", type="string", length=225, precision=0, scale=0, nullable=true, unique=false)
     */
    private $supplierShadeName;





    /**
     * @var models\inventory\Categories
     *
     * @ManyToOne(targetEntity="models\inventory\Categories")
     * @JoinColumns({
     *   @JoinColumn(name="categories_category_id", referencedColumnName="category_id", nullable=true)
     * })
     */
    private $categoriesCategory;

    /**
     * @var models\pos\PosTax
     *
     * @ManyToOne(targetEntity="models\pos\PosTax")
     * @JoinColumns({
     *   @JoinColumn(name="pos_tax_tax_class_id", referencedColumnName="tax_class_id", nullable=true)
     * })
     */
    private $posTaxTaxClass;

    /**
     * @var models\inventory\Suppliers
     *
     * @ManyToOne(targetEntity="models\inventory\Suppliers")
     * @JoinColumns({
     *   @JoinColumn(name="suppliers_supplier_id", referencedColumnName="supplier_id", nullable=true)
     * })
     */
    private $suppliersSupplier;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="created_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $createdBy;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="last_updated_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $lastUpdatedBy;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="approved_by", referencedColumnName="id", nullable=true)
     * })
     */
    private $approvedBy;


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
     * Set specialPriceFrom
     *
     * @param integer $specialPriceFrom
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
     * @return integer 
     */
    public function getSpecialPriceFrom()
    {
        return $this->specialPriceFrom;
    }

    /**
     * Set specialPriceTo
     *
     * @param integer $specialPriceTo
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
     * @return integer 
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
     * Set productActivated
     *
     * @param integer $productActivated
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
     * @return integer 
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
     * @param integer $approvedDate
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
     * @return integer 
     */
    public function getApprovedDate()
    {
        return $this->approvedDate;
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
     * Set createdDate
     *
     * @param integer $createdDate
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
     * @return Products
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
     * Set suppplierProductName
     *
     * @param string $suppplierProductName
     * @return Products
     */
    public function setSuppplierProductName($suppplierProductName)
    {
        $this->suppplierProductName = $suppplierProductName;
        return $this;
    }

    /**
     * Get suppplierProductName
     *
     * @return string 
     */
    public function getSuppplierProductName()
    {
        return $this->suppplierProductName;
    }

    /**
     * Set supplierDesignName
     *
     * @param string $supplierDesignName
     * @return Products
     */
    public function setSupplierDesignName($supplierDesignName)
    {
        $this->supplierDesignName = $supplierDesignName;
        return $this;
    }

    /**
     * Get supplierDesignName
     *
     * @return string 
     */
    public function getSupplierDesignName()
    {
        return $this->supplierDesignName;
    }


   /**
     * Set supplierShadeName
     *
     * @param string $supplierShadeName
     * @return Products
     */
    public function setSupplierShadeName($supplierShadeName)
    {
        $this->supplierShadeName = $supplierShadeName;
        return $this;
    }

    /**
     * Get supplierShadeName
     *
     * @return string 
     */
    public function getSupplierShadeName()
    {
        return $this->supplierShadeName;
    }






    /**
     * Set categoriesCategory
     *
     * @param models\inventory\Categories $categoriesCategory
     * @return Products
     */
    public function setCategoriesCategory($categoriesCategory = null)
    {
        $this->categoriesCategory = $categoriesCategory;
        return $this;
    }

    /**
     * Get categoriesCategory
     *
     * @return models\inventory\Categories 
     */
    public function getCategoriesCategory()
    {
        return $this->categoriesCategory;
    }

    /**
     * Set posTaxTaxClass
     *
     * @param models\pos\PosTax $posTaxTaxClass
     * @return Products
     */
    public function setPosTaxTaxClass($posTaxTaxClass = null)
    {
        $this->posTaxTaxClass = $posTaxTaxClass;
        return $this;
    }

    /**
     * Get posTaxTaxClass
     *
     * @return models\inventory\PosTax 
     */
    public function getPosTaxTaxClass()
    {
        return $this->posTaxTaxClass;
    }

    /**
     * Set suppliersSupplier
     *
     * @param models\inventory\Suppliers $suppliersSupplier
     * @return Products
     */
    public function setSuppliersSupplier($suppliersSupplier = null)
    {
        $this->suppliersSupplier = $suppliersSupplier;
        return $this;
    }

    /**
     * Get suppliersSupplier
     *
     * @return models\inventory\Suppliers 
     */
    public function getSuppliersSupplier()
    {
        return $this->suppliersSupplier;
    }

    /**
     * Set createdBy
     *
     * @param models\inventory\Users $createdBy
     * @return Products
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
     * Set lastUpdatedBy
     *
     * @param models\inventory\Users $lastUpdatedBy
     * @return Products
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

    /**
     * Set approvedBy
     *
     * @param models\inventory\Users $approvedBy
     * @return Products
     */
    public function setApprovedBy($approvedBy = null)
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return models\inventory\Users 
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }
}