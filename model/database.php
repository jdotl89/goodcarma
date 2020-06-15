<?php

//Require our config file
require '/home2/akaurgre/config.php';

/**
 * Class Database
 * Contains the database class and methods
 * @author Amardip Kaur
 * @author John Laygo
 * @author Michael Gulchuk
 * @version 1.0
 */
class Database
{
    /**
     * @var PDO
     */
    private $_dbh;

    /**
     * Database constructor.
     */
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

    /**
     * @param $info
     * takes order/user object and inserts to database.
     */
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
        $sql = "INSERT INTO userInfo (fName, lName, email, phone, age, type)
                VALUES (:fName, :lName, :email, :phone, :age, :type)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);
        //3. Bind the parameters
        $statement->bindParam(':fName', $info->getFname());
        $statement->bindParam(':lName', $info->getLname());
        $statement->bindParam(':email', $info->getEmail());
        $statement->bindParam(':phone', $info->getPhone());
        $statement->bindParam(':age', $info->getAge());
        $statement->bindParam(':type', $info->getVehicle());
        //4. Execute the statement
        $statement->execute();

        //5. Process the results - SKIP
    }

    /**
     * @param $info
     * takes vehicle object and inserts to database.
     */
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

    /**
     * Selects database information and displays it in html.
     */
    function view()
    {
        //Read from database

        //1. Define the query
        $sql = "SELECT * FROM vehicle";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters - SKIP
        //4. Execute the statement
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $make = $row['make'];
            $model = $row['model'];
            $year = $row['year'];
            $id = $row['id'];
            $color = $row['color'];

            $sql2 = "SELECT * FROM detail WHERE id=$id";
            $statement2 = $this->_dbh->prepare($sql2);
            $statement2->execute();
            $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

            echo "<div class=\"col-md-5 border border-dark m-3\">
                        <div class=\"form-group\">
                            <p class='font-weight-bold mt-2 text-center'>* $year $make $model *</p>";

            echo "<p class='pl-4'><strong>SPECIFICATIONS AND FEATURES:</strong><br>";

            foreach($result2 as $row2) {
                $VIN = $row2['VIN'];
                $engine = $row2['engine'];
                $transmission = $row2['transmission'];
                $terrain = $row2['terrain'];
                $material = $row2['material'];
                $infotainment = $row2['infotainment'];
                $seats = $row2['seats'];

                $sql3 = "SELECT * FROM userInfo WHERE id=$id";
                $statement3 = $this->_dbh->prepare($sql3);
                $statement3->execute();
                $result3 = $statement3->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result3 as $row3) {
                    $first = $row3['fName'];
                    $last = $row3['lName'];
                    $phone = $row3['phone'];
                    $type = $row3['type'];

                    echo "<strong>Make:</strong> $make <br>";
                    echo "<strong>Model:</strong> $model <br>";
                    echo "<strong>Year:</strong> $year <br>";
                    echo "<strong>Color:</strong> $color <br>";
                    echo "<strong>Engine:</strong> $engine <br>";
                    echo "<strong>Transmission:</strong> $transmission <br>";
                    echo "<strong>Seats:</strong> $seats <br>";

                    if($type == 'car1') {
                        echo "<strong>VIN:</strong> $VIN <br>";
                        echo "<strong>Terrain:</strong> $terrain <br>";
                        echo "<strong>Material:</strong> $material <br>";
                        echo "<strong>Infotainment:</strong> $infotainment <br>";
                    }

                    echo "</p>";
                    echo "<p class='font-weight-bold'>Please contact $first $last at $phone for questions and details!</p>";
                }
            }
            echo "</div>
                  </div>";
        }
    }
}