<?php

    //data-layer.php
// FOR THE CAR CLASS ------------------------------------------------------------------------------------------
    /* getYears()
    * Returns an array of years
    * @return array
    */
    function getYears()
    {
        $years = array(
           "2020", "2019", "2018", "2017", "2016", "2015", "2014", "2013", "2012",
            "2011", "2010", "2009", "2008", "2007", "2006", "2005", "2004", "2003",
            "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994",
            "1993", "1992", "1991", "1990", "1989 or older");
        return $years;
    }
//            , "1988", "1987", "1986", "1985",
//            "1984", "1983", "1982", "1981", "1980", "1979", "1978", "1977", "1976",
//            "1975", "1974", "1973", "1972", "1971", "1970", "1969", "1968", "1967",
//            "1966", "1965", "1964", "1963", "1962", "1961", "1960", "1959", "1958",
//            "1957", "1956", "1955", "1954", "1953", "1952", "1951", "1950", "1949",
//            "1948", "1947", "1946", "1945", "1944", "1943", "1942", "1941", "1940",
//            "1939", "1938", "1937", "1936", "1935", "1934", "1933", "1932", "1931",
//            "1930"

    /* getModels()
    * Returns an array of car models
    * @return array
    */
    function getMakes()
    {
        $makes = array('Audi', 'Bentley', 'BMW', 'Cadillac', 'Chevrolet', 'Ford',  'Jaguar',
            'Jeep', 'Mercedes-Benz', 'Nissan', 'Porsche', 'Subaru', 'Toyota');
        return $makes;
    }

    /* getMakes()
    * Returns an array of car makes
    * @return array
    */
    function getModels()
    {
        $models = array('Cabriolet', 'Convertible', 'Coupe', 'Hatchback', 'Limousine', 'Crossover',
            'Micro', 'Sedan', 'Sports Car', 'SUV', 'Truck', 'Van', 'Wagon');
        return $models;
    }

    /* getColors()
    * Returns an array of colors
    * @return array
    */
    function getColors()
    {
        $colors = array('White', 'Silver', 'Black', 'Red', 'Grey', 'Blue');
        return $colors;
    }

    // FOR THE INSIDE CAR CLASS --------------------------------------------------------------------------------------
    /* getEngine()
    * Returns an array of engine sizes
    * @return array
    */
    function getEngine()
    {
        $engine = array('4 cylinder', '6 cylinder', '8 cylinder', '10 cyclinder', '12 cylinder');
        return $engine;
    }

    /* getTransmission()
    * Returns an array of transmission modes
    * @return array
    */
    function getTransmission()
    {
        $trans = array('manual', 'automatic');
        return $trans;
    }

    /* getTerrain()
    * Returns an array of terrain modes
    * @return array
    */
    function getTerrain()
    {
        $terrain = array('rear wheel drive', 'front wheel drive', 'all wheel drive');
        return $terrain;
    }

    /* getMaterial()
    * Returns an array of materials
    * @return array
    */
    function getMaterial()
    {
        $material = array('cotton','suede', 'sythetic leather', 'leather');
        return $material;
    }

    /* getInfortainment()
    * Returns an array of stereo modes
    * @return array
    */
    function getInfotainment()
    {
        $infotainment = array('None', 'stock stereo', 'premium sound', 'apple carplay', 'navigation', 'android auto', 'apps');
        return $infotainment;
    }

    /* getSeats()
       * Returns an array of seat numbers
       * @return array
       */
    function getSeats()
    {
        $seats = array(1,2, 3, 4, 5, 6, 7);
        return $seats;
    }

    // FOR THE INSIDE MOTORCYCLE CLASS ---------------------------------------------------------------------------------

    /* getEngine()
       * Returns an array of engine sizes
       * @return array
       */
    function getMEngine()
    {
        $engine = array('1 cylinder', '2 cylinder', '3 cylinder', '4 cyclinder');
        return $engine;
    }

    /* getTransmission()
    * Returns an array of transmission modes
    * @return array
    */
    function getMTransmission()
    {
        $trans = array('manual', 'automatic');
        return $trans;
    }

    /* getSeats()
       * Returns an array of seat numbers
       * @return array
       */
    function getMSeats()
    {
        $seats = array(1, 2, 3);
        return $seats;
    }

    /* getYears()
    * Returns an array of years
    * @return array
    */
    function getMYears()
    {
        $years = array(
            "2020", "2019", "2018", "2017", "2016", "2015", "2014", "2013", "2012",
            "2011", "2010", "2009", "2008", "2007", "2006", "2005", "2004", "2003",
            "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994",
            "1993", "1992", "1991", "1990", "1989 or older");
        return $years;
    }

    /* getModels()
    * Returns an array of motorcycle models
    * @return array
    */
    function getMMakes()
    {
        $makes = array('BMW', 'Ducati', 'Honda', 'Harley Davidson', 'Kawasaki', 'Suzuki',  'Yamaha',
            'Alligator', 'Boss Hoss', 'MTT', 'MotoCzysz', 'Zero Motorcycles');
        return $makes;
    }

    /* getMakes()
    * Returns an array of car makes
    * @return array
    */
    function getMModels()
    {
        $models = array('Cruiser', 'Choppers', 'Naked', 'Motocross', 'Dirt Bikes', 'Moped',
            'Scooter', 'Quads');
        return $models;
    }

    /* getColors()
    * Returns an array of colors
    * @return array
    */
    function getMColors()
    {
        $colors = array('White', 'Silver', 'Black', 'Red', 'Grey', 'Blue');
        return $colors;
    }
