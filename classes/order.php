<?php

/**
 * Class UserInfo
 * Contains the user info class and object methods
 * @author Amardip Kaur
 * @author John Laygo
 * @author Michael Gulchuk
 * @version 1.0
 */
class UserInfo
{
    //Declare instance variables
    /**
     * @var for first name
     */
    private $_fName;
    /**
     * @var for the last name
     */
    private $_lName;
    /**
     * @var for the age
     */
    private $_age;
    /**
     * @var for the phone
     */
    private $_phone;
    /**
     * @var for the email
     */
    private $_email;
    /**
     * @var for the type of vehicle (car /  motorcyce)
     */
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
}
