<?php
/*
 * CREATE TABLE food_order (
 	order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    food VARCHAR(50),
    meal VARCHAR(10),
    condiments VARCHAR(100),
    date_time DATETIME DEFAULT NOW()
)

INSERT INTO food_order (food, meal, condiments)
VALUES ('sandwich', 'breakfast', 'sriracha, mayonnaise');
 */

//Require our config file
require '/home2/akaurgre/config.php';

class Database
{
    private $_dbh;

    function __construct()
    {
        //Connect to database with PDO
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function write($info)
    {
        $fName = $info->getFname();
        $lName = $info->getLname();
        $age = $info->getAge();
        $phone = $info->getPhone();
        $email = $info->getEmail();

        //Write to database

//        INSERT INTO vehicle (VIN, make, model, year, color)
//                VALUES ('12345123451234512', 'BMW', 'fasdfa', 2020, 'blue')
        
//        CREATE TABLE vehicle (
//        vehicleNum int PRIMARY KEY NOT NULL AUTO_INCREMENT,
//        VIN VARCHAR(17) NOT NULL,
//        model VARCHAR(50) NOT NULL,
//        make VARCHAR(50) NOT NULL,
//        year int not null,
//        color VARCHAR(50) NOT NULL,
//        id int not null,
//        FOREIGN KEY (id) REFERENCES userInfo(id)
//            );

        //1. Define the query
        $sql = "INSERT INTO userInfo (fName, lName, email, phone, age)
                VALUES (:fName, :lName, :email, :phone, :age)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':food', $order->getFood());
        $statement->bindParam(':meal', $order->getMeal());
        $statement->bindParam(':condiments', $conds);

        //4. Execute the statement
        $statement->execute();

        //5. Process the results - SKIP
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