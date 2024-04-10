<?php // Dhr. Allen Pieter

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Create an array for field names and values.
        $formFields = [];

        // Iterate over each form field submitted via POST request.
        foreach ($_POST as $fieldName => $dirtyValue) {

            // Sanitize field values to prevent cross-site scripting (XSS) attacks.
            $fieldValue = htmlspecialchars($dirtyValue);

            // Assign the sanitized field names and values to the formFields array.
            $formFields[$fieldName] = $fieldValue;
        }

        ##############################
        ##   Form Differentiating   ##
        ##############################

        ##   Login   ##   Signup   ##
        if(isset($_POST['login'])) {
            require_once '../models/login.model.php';
            require_once './login.control.php';
            $lc = new LoginControl($formFields);
            $lc->verifyLogin();
        }
        if(isset($_POST['signup']) || isset($_POST['addMember'])) {
            require_once '../models/signup.model.php';
            require_once './signup.control.php';

            if (isset($_POST['addMember'])) {
                $formFields['pwdR'] = htmlspecialchars($_POST['pwd']);
            }
            
            $lc = new SignupControl($formFields);
            $lc->verifySignup();
        }

        ##   Update   ##   Trash   ##
        if(isset($_POST['editMember'])) {
            //require_once '../models/signup.model.php';
            //require_once './signup.control.php';
            //$lc = new SignupControl($formFields);
            //$lc->verifySignup();
        }
        if(isset($_POST['undoMember'])) {
            //require_once '../models/signup.model.php';
            //require_once './signup.control.php';
            //$lc = new SignupControl($formFields);
            //$lc->verifySignup();
        }
    }