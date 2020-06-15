<?php

/**
 * Class Controller
 */
class Controller
{
    private $_f3; //router
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * Display the default route
     */
    public function home()
    {
        $this->_f3->set('database', $GLOBALS['db']);

        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function motor()
    {
        $this->_f3->set('allModels', getMModels());
        $this->_f3->set('allMakes', getMMakes());
        $this->_f3->set('allYears', getMYears());
        $this->_f3->set('allColors', getMColors());
        $this->_f3->set('engine', getMEngine());
        $this->_f3->set('transmission', getMTransmission());
        $this->_f3->set('seats', getMSeats());

        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Validate
            if (!$this->_validator->validMMake($_POST['mmake'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["mmake"]', "Incorrect make selection");
            }
            if (!$this->_validator->validMModel($_POST['mmodel'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["mmodel"]', "Incorrect model selection");
            }
            if (!$this->_validator->validYear($_POST['myear'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["myear"]', "Incorrect year selection");
            }
            if (!$this->_validator->validColor($_POST['mcolor'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["mcolor"]', "Incorrect color selection");
            }
            if (!$this->_validator->validMEngine($_POST['mengine'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["mengine"]', "Please select an engine");
            }
            if (!$this->_validator->validTransmission($_POST['mtransmission'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["mtransmission"]', "Please select a transmission");
            }
            if (!$this->_validator->validMSeats($_POST['mseats'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["mseats"]', "Please select how many seats");
            }
            //Data is valid
            if (empty($this->_f3->get('errors'))) {

                //Create object
                $motorcycle = new Motorcycle();

                ////saved in session for now ////
                $motorcycle->setMake($_POST['mmake']);
                $motorcycle->setModel($_POST['mmodel']);
                $motorcycle->setYear($_POST['myear']);
                $motorcycle->setColor($_POST['mcolor']);
                $motorcycle->setEngine($_POST['mengine']);
                $motorcycle->setTransmission($_POST['mtransmission']);
                $motorcycle->setNumSeats($_POST['mseats']);

//                //Create an order object
//                $order = new FoodOrder();
//                $order->setFood($_POST['food']);
//                $order->setMeal($_POST['meal']);
//
//                //Store the object in the session array
               $_SESSION['motorcycle'] = $motorcycle;

                //Redirect to Order 2 page
                $this->_f3->reroute('summary');
            }
        }

        // selected
        $this->_f3->set('selectedMEngine', $_POST['mengine']);
        $this->_f3->set('selectedMTransmission', $_POST['mtransmission']);
        $this->_f3->set('selectedMSeats', $_POST['mseats']);
        $this->_f3->set('selectedMMake', $_POST['mmake']);
        $this->_f3->set('selectedMModel', $_POST['mmodel']);
        $this->_f3->set('selectedMYear', $_POST['myear']);
        $this->_f3->set('selectedMColor', $_POST['mcolor']);

        $view = new Template();
        echo $view->render('views/motorcycle.html');
    }

    /**
     * Process the personal information route
     */
    public function personal()
    {
        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Validate //if data is not valid
            if (!$this->_validator->validName($_POST['firstName'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["firstName"]', "Please enter your first name");
            }
            if (!$this->_validator->validName($_POST['lastName'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["lastName"]', "Please enter your last name");
            }
            if (!$this->_validator->validAge($_POST['age'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["age"]', "Enter correct age. Must be 18 or older");
            }
            if (!empty($_POST['phone']) && !$this->_validator->validPhone($_POST['phone'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["phone"]', "Please enter correct number");
            }
            if (!$this->_validator->validEmail($_POST['email'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["email"]', "Correct email with @ and . required");
            }
            if (isset($_POST['vehicle']) && !$this->_validator->validVehicle($_POST['vehicle'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["vehicle"]', "Wrong selection");
            }
            if (!isset($_POST['vehicle'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["vehicle"]', "Please select one");
            }
            //Data is valid
            if (empty($this->_f3->get('errors'))) {

//                //Create object   ////saved in session for now ////
//                $_SESSION['firstName'] = $_POST['firstName'];
//                $_SESSION['lastName'] = $_POST['lastName'];
//                $_SESSION['age'] = $_POST['age'];
//                $_SESSION['phone'] = $_POST['phone'];
//                $_SESSION['email'] = $_POST['email'];
//                $_SESSION['vehicle'] = $_POST['vehicle'];

                $userInfo = new UserInfo($_POST['firstName'],
                    $_POST['lastName'],
                    $_POST['age'],
                    $_POST['email'],
                    $_POST['phone'],
                    $_POST['vehicle']);

                //Store the object in the session array
                $_SESSION['userInfo'] = $userInfo;

                //car or bike page?
                if($_POST['vehicle'] == 'motorcycle') {
                    //Redirect to Vehicle bike Info form page
                    $this->_f3->reroute('motor');
                }
                //Redirect to Vehicle Car Info form page
                $this->_f3->reroute('vehicleForm');
            }
        }

        $this->_f3->set('firstName', $_POST['firstName']);
        $this->_f3->set('lastName', $_POST['lastName']);
        $this->_f3->set('phone', $_POST['phone']);
        $this->_f3->set('age', $_POST['age']);
        $this->_f3->set('email', $_POST['email']);
        $this->_f3->set('vehicle', $_POST['vehicle']);

        $view = new Template();
        echo $view->render('views/personalForm.html');
    }

    /**
     * Process the vehicle information form route
     */
    public function vehicleForm()
    {
        $this->_f3->set('allModels', getModels());
        $this->_f3->set('allMakes', getMakes());
        $this->_f3->set('allYears', getYears());
        $this->_f3->set('allColors', getColors());

        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Validate
            if (!$this->_validator->validVIN($_POST['vin'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["vin"]', "Please enter correct VIN. 17 characters");
            }
            if (!$this->_validator->validMake($_POST['make'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["make"]', "Incorrect make selection");
            }
            if (!$this->_validator->validModel($_POST['model'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["model"]', "Incorrect model selection");
            }
            if (!$this->_validator->validYear($_POST['year'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["year"]', "Incorrect year selection");
            }
            if (!$this->_validator->validColor($_POST['color'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["color"]', "Incorrect color selection");
            }
            //Data is valid
            if (empty($this->_f3->get('errors'))) {
                $car = new Car();

                //Create car object
                $car->setVin($_POST['vin']);
                $car->setMake($_POST['make']);
                $car->setModel($_POST['model']);
                $car->setYear($_POST['year']);
                $car->setColor($_POST['color']);

                //Redirect to Order 2 page
                $_SESSION['automobile'] = $car;

                $this->_f3->reroute('engineInterior');
            }
        }

        $this->_f3->set('selectedVIN', $_POST['vin']);
        $this->_f3->set('selectedMake', $_POST['make']);
        $this->_f3->set('selectedModel', $_POST['model']);
        $this->_f3->set('selectedYear', $_POST['year']);
        $this->_f3->set('selectedColor', $_POST['color']);

        $view = new Template();
        echo $view->render('views/vehicleForm.html');
    }

    /**
     *
     */
    public function engineInterior()
    {
        $this->_f3->set('engine', getEngine());
        $this->_f3->set('transmission', getTransmission());
        $this->_f3->set('terrain', getTerrain());
        $this->_f3->set('material', getMaterial());
        $this->_f3->set('infotainment', getInfotainment());
        $this->_f3->set('seats', getSeats());

        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validate
            if (!$this->_validator->validEngine($_POST['engine'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["engine"]', "Please select an engine");
            }
            if (!$this->_validator->validTransmission($_POST['transmission'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["transmission"]', "Please select a transmission");
            }
            if (!$this->_validator->validTerrain($_POST['terrain'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["terrain"]', "Please select a drive terrain");
            }
            if (!$this->_validator->validMaterial($_POST['material'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["material"]', "Please select material");
            }
            if (!$this->_validator->validInfotainment($_POST['infotainment'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["infotainment"]', "Please select infotainment option");
            }
            if (!$this->_validator->validSeats($_POST['seats'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["seats"]', "Please select how many seats");
            }

            //Data is valid
            if (empty($this->_f3->get('errors'))) {

                //Redirect to summary page
                $_SESSION['automobile']->setEngine($_POST['engine']);
                $_SESSION['automobile']->setTransmission($_POST['transmission']);
                $_SESSION['automobile']->setTerrain($_POST['terrain']);
                $_SESSION['automobile']->setMaterial($_POST['material']);
                $_SESSION['automobile']->setNumSeats($_POST['seats']);
                $_SESSION['automobile']->setInfotainment($_POST['infotainment']);
                $this->_f3->reroute('summary');
            }
        }

        // selected
        $this->_f3->set('selectedEngine', $_POST['engine']);
        $this->_f3->set('selectedTransmission', $_POST['transmission']);
        $this->_f3->set('selectedTerrain', $_POST['terrain']);
        $this->_f3->set('selectedMaterial', $_POST['material']);
        $this->_f3->set('selectedSeats', $_POST['seats']);
        $this->_f3->set('selectedInfotainment', $_POST['infotainment']);

        $view = new Template();
        echo $view->render('views/engineInterior.html');
    }

    /**
     *
     */
    public function summary()
    {
        //Write to database
        $GLOBALS['db']->writeUser($_SESSION['userInfo']);

        if($_SESSION['userInfo']->getVehicle() == 'motorcycle'){
            $GLOBALS['db']->writeVehicle($_SESSION['motorcycle']);
        }
        else {
            $GLOBALS['db']->writeVehicle($_SESSION['automobile']);
        }

        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }

}