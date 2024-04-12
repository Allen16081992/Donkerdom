<?php // Dhr. Allen Pieter
    // Load Database connection
    require_once '../config/database.config.php'; // PDO
    require_once '../config/session_manager.config.php'; // Session
    require_once '../controllers/controller_traits.control.php'; // Rebounds

    class Login {
        use Rebounds;

        // Verify if the user already exists in the database.
        protected function getMember($formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare SQL statement.
            $stmt = $db->connect()->prepare('SELECT userID, username, `password`, user_level FROM members WHERE username = ? OR email = ?;');          
            
            // Extract the specified values from the formFields array.
            $uid = $formFields['username'];
            $passw = $formFields['pwd'];

            // Execute the prepared statement with the provided variables.
            if(!$stmt->execute([$uid, $passw])) {
                $_SESSION['error'] = 'User verification failed!';
                $this->reboundPath('location: ../login.php');
            }

            // Fetch the row from the result.
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the fetched result contains any row data.
            if(!$data) {
                $_SESSION['error'] = 'Unable to find a user.';
                $this->reboundPath('location: ../login.php');
            }

            // Extract the hashed password from the fetched array.
            $pwdHash = $data['password'];

            // Verify the password against the hash using the salt.
            if (!password_verify($passw, $pwdHash)) {
                $_SESSION['error'] = "Incorrect password.";
                $this->reboundPath('location: ../login.php');
            }

            $_SESSION['session_data'] = array(
                'user_id' => $data['userID'],
                'username' => $data['username'],
                'rank' => $data['user_level']
            );

            $_SESSION['success'] = "Hallo, ".$data['username'];

            // Head to the council page.
            $this->reboundPath('location: ../council.php');
        }
    }