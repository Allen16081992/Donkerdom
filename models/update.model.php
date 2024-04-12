<?php // Dhr. Allen Pieter
    // Load Database connection
    require_once '../config/database.config.php'; // PDO
    require_once '../config/session_manager.config.php'; // Session
    require_once '../controllers/controller_traits.control.php'; // Rebounds

    class Update {
        use Rebounds;

        // Update the new member in the Database
        protected function updateMember($formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Check if user level was given.
            if (!empty($formFields['user_level'])) {
                $rank = $formFields['user_level'];
            } else { 
                $rank = 1; // Guest level.
            } 

            if (!empty($formFields['pwd'])) {  
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
                $stmt = $db->connect()->prepare("UPDATE members SET username = :username, firstname = :firstname, lastname = :lastname, password = :password, email = :email, user_level = :user_level WHERE userID = :userID;");
                $stmt->bindParam(":username", $formFields['username']);
                $stmt->bindParam(":firstname", $formFields['firstname']);
                $stmt->bindParam(":lastname", $formFields['lastname']);
                $stmt->bindParam(":password", $HashThisNOW);
                $stmt->bindParam(":email", $formFields['email']);
                $stmt->bindParam(":user_level", $rank);
                $stmt->bindParam(":userID", $formFields['uid']);
                $stmt->execute();
                $stmt = null;

            } else {
                // Prepare SQL statement.
                $stmt = $db->connect()->prepare("UPDATE members SET username = :username, firstname = :firstname, lastname = :lastname, email = :email, user_level = :user_level WHERE userID = :userID;");
                $stmt->bindParam(":username", $formFields['username']);
                $stmt->bindParam(":firstname", $formFields['firstname']);
                $stmt->bindParam(":lastname", $formFields['lastname']);
                $stmt->bindParam(":email", $formFields['email']);
                $stmt->bindParam(":user_level", $rank);
                $stmt->bindParam(":userID", $formFields['uid']);
                $stmt->execute();
                $stmt = null;
            }

            $_SESSION['success'] = "Wijzigingen opgeslagen";

            // Head to the council page.
            $this->reboundPath('location: ../council.php');
        }
    }