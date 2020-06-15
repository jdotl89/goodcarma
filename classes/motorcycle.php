<?php

/**
 * Class Motorcycle
 * Contains the motorcyle object class and methods
 * @author Amardip Kaur
 * @author John Laygo
 * @author Michael Gulchuk
 * @version 1.0
 */
class Motorcycle extends Vehicle
{
    //Declare instance variables
    /** Default constructor
     * @param $year the year
     * @param $make the make
     * @param $model the model
     * @param $engine the engine
     * @param $transmission the transmission
     * @param $color the color
     * @param $numSeats the number of seats
     */
    public function __construct($year = "2000", $make = "bmw", $model = "sedan", $engine = "4 cycliner", $transmission = "automatic", $color = "red", $numSeats = "2")
    {
        parent::__construct($year, $make, $model, $engine, $transmission, $color, $numSeats);
    }
}