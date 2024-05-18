<?php 
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Initialize an array for sanitized form fields
        $formFields = [];

        // Sanitize each form field submitted via POST
        foreach ($_POST as $fieldName => $dirtyValue) {
            $fieldValue = htmlspecialchars($dirtyValue);
            $formFields[$fieldName] = $fieldValue;
        }

        // Determine the type of form submission and process accordingly
        if (isset($_POST['login'])) {
            require_once '../models/login.model.php';
            require_once './login.control.php';
            $lc = new LoginControl($formFields);
            $lc->verifyLogin();
            
        } elseif (isset($_POST['signup']) && !isset($formFields['terms']) || $formFields['terms'] !== 'on') {
            require_once '../config/session_manager.config.php';
            $_SESSION['error'] = 'Please accept the terms and conditions.';
            header('location: ../signup.php');

        } elseif (isset($_POST['signup']) || isset($_POST['addMember'])) {
            require_once '../models/signup.model.php';
            require_once './signup.control.php';
            
            // Set 'pwdR' field if adding a member
            if (isset($_POST['addMember'])) {
                $formFields['pwdR'] = htmlspecialchars($_POST['pwd']);
            }
            
            $lc = new SignupControl($formFields);
            $lc->verifySignup();

        } elseif (isset($_POST['editMember']) || isset($_POST['editMyself'])) {
            require_once '../models/update.model.php';
            require_once './update.control.php';
            
            // Set 'pwdR' field for edit operations
            if (isset($_POST['pwd'])) {
                $formFields['pwdR'] = htmlspecialchars($_POST['pwd']);
            }
            
            $lc = new UpdateControl($formFields);
            $lc->verifyEdit();

        } elseif (isset($_POST['undoMember']) || isset($_POST['shutAcc'])) {
            require_once '../models/delete.model.php';
            require_once './delete.control.php';
            $lc = new DeleteControl($formFields);
            $lc->deleteAccount();
        }
        elseif (isset($_POST['item_id'])) {
            require_once '../models/delete.model.php';
            require_once './delete.control.php';
            $lc = new DeleteControl($formFields);
            $lc->deleteSubject();
        }
    }