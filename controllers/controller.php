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

    /**
     * Process the personal information route
     */
    public function order()
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
            if (!$this->_validator->validPhone($_POST['phone'])) {

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
        echo $view->render('views/orderForm.html');
    }

    /**
     * Process the order route
     */
    public function vehicleForm()
    {
        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Validate food
            /*if (!$this->_validator->validFood($_POST['food'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["food"]', "Invalid food item");
            }
            if (!$this->_validator->validMeal($_POST['meal'])) {

                //Set an error variable in the F3 hive
                $this->_f3->set('errors["meal"]', "Invalid meal.");
            }
            //Data is valid
            if (empty($this->_f3->get('errors'))) {

                //Create an order object
                $order = new FoodOrder();
                $order->setFood($_POST['food']);
                $order->setMeal($_POST['meal']);

                //Store the object in the session array
                $_SESSION['order'] = $order;

                //Redirect to Order 2 page
                $this->_f3->reroute('order2');
            }
        }

        $this->_f3->set('meals', getMeals());
        $this->_f3->set('food', $_POST['food']);
        $this->_f3->set('selectedMeal', $_POST['meal']);
        */

            $this->_f3->reroute('order2');
        }

        $view = new Template();
        echo $view->render('views/vehicleForm.html');
    }

    /**
     *
     */
    public function order2()
    {
        $conds = getCondiments();

        //If the form has been submitted
        /*if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Add the data to the object in the session array
            $_SESSION['order']->setCondiments($_POST['conds']);
        */
            //Redirect to summary page
            $this->_f3->reroute('summary');
       //}

        $view = new Template();
        echo $view->render('views/engineInterior.html');
    }

    /**
     *
     */
    public function summary()
    {
        //echo '<h1>Thank you for your order!</h1>';

        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }
}