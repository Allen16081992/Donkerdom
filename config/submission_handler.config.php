<?php // Dhr. Allen Pieter
    // core file requirements.
    //require_once 'peripherals/session_management.config.php';
    //require_once "idb.config.php";
    //require_once "Classes/createresume.class.config.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        ##   Login   ##
        if(isset($_POST['login'])) {
            // Absorb data
            $username = $_POST['username']; 
            $passw = $_POST['pwd']; 
        }

        ##   Register   ##
        if(isset($_POST['signup'])) {
            // Absorb data in the first step of the registration form
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username']; 
            $email = $_POST['email']; 
            $passw = $_POST['pwd']; 
            $passwRepeat = $_POST['pwdR']; 
        }
    }