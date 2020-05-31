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

    /** Default constructor
     * @param $year the year
     * @param $make the make
     * @param $model the model
     * @param $engine the engine
     * @param $transmission the transmission
     * @param $color the color
     * @param $terrain the drive terrain
     * @param $material the material
     * @param $infotainment the infotainment
     * @param $numSeats the number of seats
     */
    public function __construct($year, $make, $model, $engine, $transmission,
                                $color, $terrain, $material, $infotainment, $numSeats)
    {
        $this->_year = $year;
        $this->_make = $make;
        $this->_model = $model;
        $this->_engine = $engine;
        $this->_transmission = $transmission;
        $this->_color = $color;
        $this->_terrain = $terrain;
        $this->_material = $material;
        $this->_infotainment = $infotainment;
        $this->_numSeats = $numSeats;
    }

    /**
     * @return the year
     */
    public function getYear()
    {
        return $this->_year;
    }

    /**
     * @return the make
     */
    public function getMake()
    {
        return $this->_make;
    }

    /**
     * @return the model
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * @return the engine
     */
    public function getEngine()
    {
        return $this->_engine;
    }

    /**
     * @return the transmission
     */
    public function getTransmission()
    {
        return $this->_transmission;
    }

    /**
     * @return the color
     */
    public function getColor()
    {
        return $this->_color;
    }

    /**
     * @return the terrain
     */
    public function getTerrain()
    {
        return $this->_terrain;
    }

    /**
     * @return the material
     */
    public function getMaterial()
    {
        return $this->_material;
    }

    /**
     * @return the infotainment
     */
    public function getInfotainment()
    {
        return $this->_infotainment;
    }

    /**
     * @return the number of seats
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