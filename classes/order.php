<?php

class UserInfo
{
    //Declare instance variables
    private $_fName;
    private $_lName;
    private $_age;
    private $_phone;
    private $_email;
    private $_vehicle;

    /** Default constructor
     * @param $fName the first name
     * @param $lName the last name
     * @param $age the age
     * @param $phone the phone number
     * @param $email the email address
     * @param $vehicle the type of vehicle
     */
    public function __construct($fName, $lName, $age, $email, $phone, $vehicle)
    {
        $this->_fName = $fName;
        $this->_lName = $lName;
        $this->_age = $age;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_vehicle = $vehicle;
    }

    /**
     * @return the first name
     */
    public function getFName()
    {
        return $this->_fName;
    }

    /**
     * @return the last name
     */
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * @return the age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @return the phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return the email address
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return the type of vehicle
     */
    public function getVehicle()
    {
        return $this->_vehicle;
    }


    /** toString() returns a String representation
     *  of an order object
     *  @return string
     */
    public function toString()
    {
        $out = $this->_food . ", ";
        $out .= $this->_meal . ", ";

        if (!empty($this->_condiments)) {
            $out .= implode(" & ", $this->_condiments);
        }

        return $out;
    }
}
