<?php

/**
 * Class Validate
 * Contains the validation class and methods
 * @author Amardip Kaur
 * @author John Laygo
 * @author Michael Gulchuk
 * @version 1.0
 */
class Validate
{
    /* Return a value indicating if name parameter is valid
       Valid name is not empty and do not contain anything except letters
       @param String $name
       @return boolean
    */
    function validName($name)
    {
        $name = str_replace(' ', '', $name); //remove white space
        //not empty         //all alphabets
        return !empty($name) && ctype_alpha($name);
    }

    /* Return a value indicating if age is valid
       Valid age is being older than 18 and all numeric
       @param String $age
       @return boolean
    */
    function validAge($age)
    {
        //not empty         //numeric           //between 18 and 118
        return !empty($age) && is_numeric($age) && ($age >= 18 && $age <= 120);
    }

    /* Return a value indicating if phone number is valid
       Valid phone is 10 letter or more and all numeric
       @param String $number
       @return boolean
    */
    function validPhone($number)
    {
        $number = str_replace(' ', '', $number); //remove white space
        //10 characters or more         //numeric
        return (strlen($number) >= 10 && is_numeric($number));  // 1 if true
    }

    /* Return a value indicating if email is valid
       Valid email includes @ and .
       @param String $email
       @return boolean
    */
    function validEmail($email)
    {
        $number = str_replace(' ', '', $email); //remove white space
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /* Return a value indicating if vehicle selection is valid
       Valid vehicle is car or motorcycle
       @param String $vehicle
       @return boolean
    */
    function validVehicle($vehicle)
    {
        return $vehicle == 'car1' || $vehicle == 'motorcycle';
    }

    /* Return a value indicating if vin is valid
      Valid vin is 17 characters long
      @param String $vin
      @return boolean
   */
    function validVIN($vin)
    {
        $vin = str_replace(' ', '', $vin); //remove white space
                //17 characters      //numeric
        return (strlen($vin) == 17);  // 1 if true
    }

    /* Return a value indicating if model is valid
       Valid model is choosing correct option
       @param String $model
       @return boolean
    */
    function validMake($make)
    {
        return (in_array($make, getMakes()));
    }

    /* Return a value indicating if model is valid
      Valid model is choosing correct option
      @param String $model
      @return boolean
   */
    function validModel($model)
    {
        return (in_array($model, getModels()));
    }

    /* Return a value indicating if year is valid
     Valid year is choosing correct option
     @param String $year
     @return boolean
  */
    function validYear($year)
    {
        return (in_array($year, getYears()));
    }

    /* Return a value indicating if color is valid
     Valid color is choosing correct option
     @param String $color
     @return boolean
  */
    function validColor($color)
    {
        return (in_array($color, getColors()));
    }

    // FOR THE INSIDE CLASS ------------------------------------------------------------------------------------------
    /* Return a value indicating if engine is valid
     Valid engine is choosing correct option
     @param String $engine
     @return boolean
    */
    function validEngine($engine)
    {
        return (in_array($engine, getEngine()));
    }

    /* Return a value indicating if transmission is valid
     Valid transmission is choosing correct option
     @param String $transmission
     @return boolean
    */
    function validTransmission($transmission)
    {
        return (in_array($transmission, getTransmission()));
    }

    /* Return a value indicating if terrain is valid
     Valid terrain is choosing correct option
     @param String $terrain
     @return boolean
    */
    function validTerrain($terrain)
    {
        return (in_array($terrain, getTerrain()));
    }

    /* Return a value indicating if material is valid
     Valid material is choosing correct option
     @param String $material
     @return boolean
    */
    function validMaterial($material)
    {
        return (in_array($material, getMaterial()));
    }

    /* Return a value indicating if seats is valid
     Valid seats is choosing correct option
     @param String $seats
     @return boolean
    */
    function validSeats($seats)
    {
        return (in_array($seats, getSeats()));
    }

    /** Return a value indicating if every value in
    the $infotainment array is in the list of
    valid options.
    @param String[] $infotainment
    @return boolean
     */
    function validInfotainment($info)
    {
        $infotainments = getInfotainment();

        if(empty($info)) {
            return false;
        }

        //We need to check each option in our array
        foreach ($info as $selected) {
            if(!in_array($selected, $infotainments)) {
                return false;
            }
        }
        return true;
    }

    // Motorcycle validation------------------------------------------------------------------------------------
    function validMMake($make)
    {
        return (in_array($make, getMMakes()));
    }

    /* Return a value indicating if model is valid
      Valid model is choosing correct option
      @param String $model
      @return boolean
   */
    function validMModel($model)
    {
        return (in_array($model, getMModels()));
    }

    /* Return a value indicating if engine is valid
     Valid engine is choosing correct option
     @param String $engine
     @return boolean
    */
    function validMEngine($engine)
    {
        return (in_array($engine, getMEngine()));
    }

    /* Return a value indicating if seats is valid
     Valid seats is choosing correct option
     @param String $seats
     @return boolean
    */
    function validMSeats($seats)
    {
        return (in_array($seats, getMSeats()));
    }
}
