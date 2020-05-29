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
        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function motor()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_f3->reroute('personal');
        }

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
            //Data is valid
            if (empty($this->_f3->get('errors'))) {

                //Create object   ////saved in session for now ////
                $_SESSION['firstName'] = $_POST['firstName'];
                $_SESSION['lastName'] = $_POST['lastName'];
                $_SESSION['age'] = $_POST['age'];
                $_SESSION['phone'] = $_POST['phone'];
                $_SESSION['email'] = $_POST['email'];

                //Redirect to Vehicle Info form page
                $this->_f3->reroute('vehicleForm');

//                $order = new FoodOrder();
//                $order->setFood($_POST['food']);
//                $order->setMeal($_POST['meal']);
//
//                //Store the object in the session array
//                $_SESSION['order'] = $order;
            }
        }

        $this->_f3->set('firstName', $_POST['firstName']);
        $this->_f3->set('lastName', $_POST['lastName']);
        $this->_f3->set('phone', $_POST['phone']);
        $this->_f3->set('age', $_POST['age']);
        $this->_f3->set('email', $_POST['email']);

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
                $this->_f3->set('errors["vin"]', "Please enter correct VIN");
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

                //Create object   ////saved in session for now ////
                $_SESSION['vin'] = $_POST['vin'];
                $_SESSION['model'] = $_POST['model'];
                $_SESSION['year'] = $_POST['year'];
                $_SESSION['color'] = $_POST['color'];

//                //Create an order object
//                $order = new FoodOrder();
//                $order->setFood($_POST['food']);
//                $order->setMeal($_POST['meal']);
//
//                //Store the object in the session array
//                $_SESSION['order'] = $order;

                //Redirect to Order 2 page
                $this->_f3->reroute('engineInterior');
            }
        }

        $this->_f3->set('selectedVIN', $_POST['vin']);
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
            //Add the data to the object in the session array
            //$_SESSION['order']->setCondiments($_POST['conds']);

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
                $_SESSION['engine'] = $_POST['engine'];
                $_SESSION['transmission'] = $_POST['transmission'];
                $_SESSION['terrain'] = $_POST['terrain'];
                $_SESSION['material'] = $_POST['material'];
                $_SESSION['seats'] = $_POST['seats'];
                $_SESSION['infotainment'] = $_POST['infotainment'];
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

        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }
}