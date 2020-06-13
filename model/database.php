<?php

//Require our config file
require '/home2/akaurgre/config.php';
class Database
{
    private $_dbh;

    function __construct()
    {
        //connect to database with PDO
        try {
            //instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function writeUser($info)
    {

//        INSERT INTO vehicle (make, model, year, color)
//                VALUES ('BMW', 'fasdfa', 2020, 'blue')

//        CREATE TABLE vehicle (
//        id int  NOT NULL AUTO_INCREMENT,
//        VIN VARCHAR(17) NOT NULL,
//        model VARCHAR(50) NOT NULL,
//        make VARCHAR(50) NOT NULL,
//        year int not null,
//        color VARCHAR(50) NOT NULL,
//        PRIMARY KEY (id),
//        FOREIGN KEY (id) REFERENCES userInfo(id)
//           );


        //Write to database

        //1. Define the query
        $sql = "INSERT INTO userInfo (fName, lName, email, phone, age)
                VALUES (:fName, :lName, :email, :phone, :age)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':fName', $info->getFname());
        $statement->bindParam(':lName', $info->getLname());
        $statement->bindParam(':email', $info->getEmail());
        $statement->bindParam(':phone', $info->getPhone());
        $statement->bindParam(':age', $info->getAge());

        //4. Execute the statement
        $statement->execute();

        //5. Process the results - SKIP
    }

    function writeVehicle($info)
    {
//        CREATE TABLE detail (
//        id int  NOT NULL AUTO_INCREMENT,
//        VIN VARCHAR(20),
//        engine VARCHAR(50) NOT NULL,
//        transmission VARCHAR(20) not null,
//        terrain VARCHAR(50),
//        material VARCHAR(50),
//        infotainment VARCHAR(200),
//        seats int NOT NULL,
//        PRIMARY KEY (id),
//        FOREIGN KEY (id) REFERENCES vehicle(id)
//           );

        //Write main vehicle info to database

        $sql = "INSERT INTO vehicle (make, model, year, color)
              VALUES (:make, :model, :year, :color)";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':make', $info->getMake());
        $statement->bindParam(':model', $info->getModel());
        $statement->bindParam(':year', $info->getYear());
        $statement->bindParam(':color', $info->getColor());

        $statement->execute();

        //Write extra detail of vehicle to database

        if ($info instanceOf Car) {
            $infotainment = $info->getInfotainment();
            if (empty($infotainment)) {
                $infotainment = "";
            } else {
                $infotainment = implode(", ", $infotainment);
            }

            $sql = "INSERT INTO detail (VIN, engine, transmission, terrain, material, infotainment, seats)
              VALUES (:VIN, :engine, :transmission, :terrain, :material, :infotainment, :seats)";

            $statement = $this->_dbh->prepare($sql);

            $statement->bindParam(':VIN', $info->getVIN());
            $statement->bindParam(':engine', $info->getEngine());
            $statement->bindParam(':transmission', $info->getTransmission());
            $statement->bindParam(':terrain', $info->getTerrain());
            $statement->bindParam(':material', $info->getMaterial());
            $statement->bindParam(':infotainment',$infotainment);
            $statement->bindParam(':seats', $info->getNumSeats());

            $statement->execute();
        }
        else {
            $sql = "INSERT INTO detail (engine, transmission, seats)
              VALUES (:engine, :transmission, :seats)";

            $statement = $this->_dbh->prepare($sql);

            $statement->bindParam(':engine', $info->getEngine());
            $statement->bindParam(':transmission', $info->getTransmission());
            $statement->bindParam(':seats', $info->getNumSeats());

            $statement->execute();
        }
    }

    function view()
    {
        //Read fro database
        //1. Define the query
        $sql = "SELECT * FROM food_order 
                ORDER BY date_time DESC";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters - SKIP

        //4. Execute the statement
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}