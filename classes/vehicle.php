<?php

class Vehicle
{
    //Declare instance variables
    private $_year;
    private $_make;
    private $_model;
    private $_engine;
    private $_transmission;
    private $_color;
    private $_numSeats;

    /** Default constructor
     * @param string $year the year
     * @param string $make the make
     * @param string $model the model
     * @param string $engine the engine
     * @param string $transmission the transmission
     * @param string $color the color
     * @param string $numSeats
     */
    public function __construct($year = "2000",
                                $make = "bmw",
                                $model = "sedan",
                                $engine = "4 cycliner",
                                $transmission = "automatic",
                                $color = "red",
                                $numSeats = "2")
    {
        $this->setYear($year);
        $this->setMake($make);
        $this->setModel($model);
        $this->setEngine($engine);
        $this->setTransmission($transmission);
        $this->setColor($color);
        $this->setNumSeats($numSeats);
    }

    /** Set the year
     *  @param $year the year
     */
    public function setYear($year)
    {
        $this->_year = $year;
    }

    /** Get the year
     *  @return the year
     */
    public function getYear()
    {
        return $this->_year;
    }

    /**
 * @param string the $make
 */
    public function setMake($make)
    {
        $this->_make = $make;
    }

    /**
     * @return string the make
     */
    public function getMake()
    {
        return $this->_make;
    }

    /**
     * @param string the $model
     */
    public function setModel($model)
    {
        $this->_model = $model;
    }

    /**
     * @return string the model
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * @param string the $engine
     */
    public function setEngine($engine)
    {
        $this->_engine = $engine;
    }

    /**
     * @return string the engine
     */
    public function getEngine()
    {
        return $this->_engine;
    }

    /**
     * @param string the $transmission
     */
    public function setTransmission($transmission)
    {
        $this->_transmission = $transmission;
    }

    /**
     * @return string the transmission
     */
    public function getTransmission()
    {
        return $this->_transmission;
    }

    /**
     * @param string the $color
     */
    public function setColor($color)
    {
        $this->_color = $color;
    }

    /**
     * @return string the color
     */
    public function getColor()
    {
        return $this->_color;
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


}
