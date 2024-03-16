<?php // Dhr. Allen Pieter
    require_once '../config/session_manager.config.php';

    #############################
    ##   Submission  Handler   ##
    #############################
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Initialize an array for field names and values.
        $formFields = [];

        // Iterate over each form field submitted via POST request.
        foreach ($_POST as $fieldName => $fieldValue) {
            // Sanitize field values to prevent cross-site scripting (XSS) attacks.
            $fieldValue = htmlspecialchars($fieldValue);
            // Assign the sanitized field names and values to the formFields array.
            $formFields[$fieldName] = $fieldValue;
        }

        ##   Login   ##   Signup   ## 
        if(isset($_POST['login'])) {
            require_once '../models/login.model.php';
            require_once './login.control.php';
            $lc = new LoginControl($formFields);
            $lc->verifyLogin();
        }
        if(isset($_POST['signup'])) {
            require_once '../models/signup.model.php';
            require_once './signup.control.php';
            $lc = new SignupControl($formFields);
            $lc->verifySignup();
        }

        //$db = Database::getInstance();
        //$conn = $db->connect();
    }