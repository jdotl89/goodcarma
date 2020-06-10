<?php

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
    public function __construct($year = "2000", $make = "bmw", $model = "sedan", $engine = "4 cycliner", $transmission = "automatic", $color = "red")
    {
        parent::__construct($year, $make, $model, $engine, $transmission, $color);
    }

}