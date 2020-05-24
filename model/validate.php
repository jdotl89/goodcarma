<?php

/**
 * Class Validate
 * Contains the validation methods for my app
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

    /* Return a value indicating if meal is valid
       Valid meals are breakfast, lunch and dinner
       @param String $meal
       @return boolean
    */
    function validMeal($meal)
    {
        $meals = getMeals();
        return in_array($meal, $meals);
    }
}

    /*
    echo validMeal('breakfast') ? "yes<br>" : "no<br>";
    echo validMeal('') ? "yes<br>" : "no<br>";
    echo validMeal('dessert') ? "yes<br>" : "no<br>";
    echo validMeal('lunch') ? "yes<br>" : "no<br>";
    */

    /* for testing purposes only
    echo validFood("french fries") ? "yes<br>" : "no<br>";
    echo validFood("pizza") ? "yes<br>" : "no<br>";
    echo validFood("7-layer dip") ? "yes<br>" : "no<br>";
    echo validFood("") ? "yes<br>" : "no<br>";
    */