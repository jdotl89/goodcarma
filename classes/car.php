<?php

class Car extends Vehicle
{
    //Declare instance variables
    private $_year;
    private $_make;
    private $_model;
    private $_engine;
    private $_transmission;
    private $_color;
    private $_terrain;
    private $_material;
    private $_infotainment;
    private $_numSeats;
    private $_vin;

    /** Default constructor
    @param $vin
     * @param $year
     * @param $make
     * @param $model
     * @param $engine
     * @param $transmission
     * @param $color
     * @param $terrain
     * @param $material
     * @param $infotainment
     * @param $numSeats
     */
    public function __construct($vin = "a0000000000000000", $year = "2000", $make = "bmw", $model = "sedan", $engine = "4 cycliner", $transmission = "automatic", $color = "red")
    {
        parent::__construct($year, $make, $model, $engine, $transmission, $color);
        $this->setVin($vin);
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
     * @return year
     */
    public function getYear()
    {
        return $this->_year;
    }

    /**
     * @return make
     */
    public function getMake()
    {
        return $this->_make;
    }

    /**
     * @return model
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * @return engine
     */
    public function getEngine()
    {
        return $this->_engine;
    }

    /**
     * @return transmission
     */
    public function getTransmission()
    {
        return $this->_transmission;
    }

    /**
     * @return color
     */
    public function getColor()
    {
        return $this->_color;
    }

    /**
     * @return terrain
     */
    public function getTerrain()
    {
        return $this->_terrain;
    }

    /**
     * @return material
     */
    public function getMaterial()
    {
        return $this->_material;
    }

    /**
     * @return infotainment
     */
    public function getInfotainment()
    {
        return $this->_infotainment;
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
    public function toString()
    {
        return $this->_make . " " . $this->_model . " " . $this->_year;
    }
}