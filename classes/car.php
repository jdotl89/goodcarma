<?php

class Car extends Vehicle
{
    //Declare instance variables
    private $_vin;
    private $_terrain;
    private $_material;
    private $_infotainment;
    private $_numSeats;

    /** Default constructor
     * @param string $year
     * @param string $make
     * @param string $model
     * @param string $engine
     * @param string $transmission
     * @param string $color
     */
    public function __construct( $year = "2000", $make = "bmw", $model = "sedan", $engine = "4 cycliner", $transmission = "automatic", $color = "red")
    {
        parent::__construct($year, $make, $model, $engine, $transmission, $color);

    }

    /**
     * @return mixed
     */
    public function getVin()
    {
        return $this->_vin;
    }

    /**
     * @param mixed $vin
     */
    public function setVin($vin)
    {
        $this->_vin = $vin;
    }

    /**
     * @param mixed $terrain
     */
    public function setTerrain($terrain)
    {
        $this->_terrain = $terrain;
    }

    /**
     * @return terrain
     */
    public function getTerrain()
    {
        return $this->_terrain;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->_material = $material;
    }

    /**
     * @return material
     */
    public function getMaterial()
    {
        return $this->_material;
    }

    /**
     * @param mixed $infotainment
     */
    public function setInfotainment($infotainment)
    {
        $this->_infotainment = $infotainment;
    }

    /**
     * @return infotainment
     */
    public function getInfotainment()
    {
        return $this->_infotainment;
    }

    /**
     * @param mixed $numSeats
     */
    public function setNumSeats($numSeats)
    {
        $this->_numSeats = $numSeats;
    }

    /**
     * @return number of seats
     */
    public function getNumSeats()
    {
        return $this->_numSeats;
    }

    /** toString() returns a String representation
     *  of an car object
     *  @return string
     */

}