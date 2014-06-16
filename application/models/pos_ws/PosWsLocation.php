<?php

namespace models\posws;


/**
 * models\inventory\PosWsLocation
 *
 * @Table(name="pos_ws_location")
 * @Entity
 */
class PosWsLocation
{
    /**
     * @var integer $locationId
     *
     * @Column(name="location_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var float $latitude
     *
     * @Column(name="latitude", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $latitude;

    /**
     * @var float $longitude
     *
     * @Column(name="longitude", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $longitude;

    /**
     * @var integer $createdDate
     *
     * @Column(name="created_date", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdDate;

    /**
     * @var models\inventory\Users
     *
     * @ManyToOne(targetEntity="models\inventory\Users")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;


    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return PosWsLocation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return PosWsLocation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set createdDate
     *
     * @param integer $createdDate
     * @return PosWsLocation
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
     * Set user
     *
     * @param models\inventory\Users $user
     * @return PosWsLocation
     */
    public function setUser(\models\inventory\Users $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return models\inventory\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}