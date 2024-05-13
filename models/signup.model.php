<?php 
    // Load Database connection
    require_once '../config/database.config.php'; // PDO
    require_once '../config/session_manager.config.php'; // Session
    require_once '../controllers/controller_traits.control.php'; // Rebounds

    class Signup {
        use Rebounds;

        protected function verifyMember($formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Extract the submitted values from the formFields array.
            $uid = $formFields['username'];
            $email = $formFields['email'];

            // Get all associated rows
            $stmt = $db->connect()->prepare('SELECT COUNT(*) FROM members WHERE username = ? OR email = ?;');

            // Verify if request was succesfull
            if(!$stmt->execute([$uid, $email])) {
                $_SESSION['error'] = "Our servers are down for maintenance.<br> Please contact the administrator.";

                // Head to the signup page
                $this->reboundPath('location: ../signup.php');
            }
            if ($stmt->fetchColumn() > 0) {
                $_SESSION['error'] = "This username is already in use.";

                // Head to the signup page
                $this->reboundPath('location: ../signup.php');
            }

            // If no matching result is found, create the user
            $this->setMember($uid, $email, $formFields);
        }

        // Set the new member in the Database
        protected function setMember($uid, $email, $formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Extract the submitted password from the formFields array.
            $passw = $formFields['pwd'];

            // Prepare the Argon2 Hashing Algorithm, Password Hashing Competition (PHC) 2015 winner
            $options = [
                'memory_cost' => 1<<17,   // 128 MB memory cost
                'time_cost' => 10,         // 4 iterations
                'threads' => 1            // 4 parallel threads
            ]; 
            $HashThisNOW = password_hash($passw, PASSWORD_ARGON2I, $options);  

            // Prepare SQL statement.
            $stmt = $db->connect()->prepare("INSERT INTO members (username, firstname, lastname, `password`, email, user_level) VALUES (?, ?, ?, ?, ?, ?);");

            // Extract the other values from the formFields array.
            $fname = $formFields['firstname'];
            $lname = $formFields['lastname'];

            // Check if a user level was given.
            if (!empty($formFields['user_level'])) {
                $rank = $formFields['user_level'];
            } else { 
                $rank = 1; // Guest level.
            } 

            // Execute the prepared statement with the provided variables.
            if(!$stmt->execute([$uid, $fname, $lname, $HashThisNOW, $email, $rank])) {
                $_SESSION['error'] = "Account creation failed.<br> Please contact the administrator.";

                // Head to the signup page
                $this->reboundPath('location: ../signup.php');
            }

            $_SESSION['success'] = "Bedankt voor het aanmelden.<br> Welkom bij Team Dark Sanctuary!<br>En vergeet onze vleermuis niet te aaien!";
            
            // Head to the login page
            $this->reboundPath('location: ../login.php');
        }
    }