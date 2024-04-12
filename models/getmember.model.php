<?php // Dhr. Allen Pieter
    // Load Database connection
    require_once './config/database.config.php'; // PDO

    class GetMember {

        // Verify if the user already exists in the database.
        public function getMember() {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            $userID = $_SESSION['session_data']['user_id'];

            // Prepare SQL statement.
            $stmt = $db->connect()->prepare('SELECT username, firstname, lastname, email, user_level FROM members WHERE userID = ?;');          
            $stmt->execute([$userID]);

            // Fetch the row from the result.
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    $sm = new GetMember();
    $myData = $sm->getMember();