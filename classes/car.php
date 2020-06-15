<?php

/**
 * Class Car
 * Contains the car object class and methods
 * @author Amardip Kaur
 * @author John Laygo
 * @author Michael Gulchuk
 * @version 1.0
 */
class Car extends Vehicle
{
    //Declare instance variables
    /**
     * @var for the vin number
     */
    private $_vin;
    /**
     * @var for the terrain type
     */
    private $_terrain;
    /**
     * @var for the interior material type
     */
    private $_material;
    /**
     * @var for the infortainment features
     */
    private $_infotainment;
    /**
     * @var for the number of seats
     */
    private $_numSeats;

    /** Default constructor
     * @param string $year
     * @param string $make
     * @param string $model
     * @param string $engine
     * @param string $transmission
     * @param string $color
     */
    public function __construct($year = "2000", $make = "bmw", $model = "sedan", $engine = "4 cycliner", $transmission = "automatic", $color = "red", $numSeats = "2")
    {
        parent::__construct($year, $make, $model, $engine, $transmission, $color, $numSeats);
    }

    /**
     * @return $_vin
     */
    public function getVin()
    {
        return $this->_vin;
    }

    /**
     * @param String $vin
     */
    public function setVin($vin)
    {
        $this->_vin = $vin;
    }

    /**
     * @param String $terrain
     */
    public function setTerrain($terrain)
    {
        $this->_terrain = $terrain;
    }

    /**
     * @return $t_errain
     */
    public function getTerrain()
    {
        return $this->_terrain;
    }

    /**
     * @param String $material
     */
    public function setMaterial($material)
    {
        $this->_material = $material;
    }

    /**
     * @return $_material
     */
    public function getMaterial()
    {
        return $this->_material;
    }

    /**
     * @param String $infotainment
     */
    public function setInfotainment($infotainment)
    {
        $this->_infotainment = $infotainment;
    }

    /**
     * @return $_infotainment
     */
    public function getInfotainment()
    {
        return $this->_infotainment;
    }
}