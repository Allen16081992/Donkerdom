<?php // Dhr. Allen Pieter
    // Load Database connection
    require_once './config/database.config.php'; // PDO
    //require_once '../config/session_manager.config.php'; // Session

    class Datamule {

        // Verify if the user already exists in the database.
        public function getData() {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare SQL statement.
            $stmt = $db->connect()->prepare('SELECT userID, username, firstname, lastname, email, user_level FROM members;');          
            $stmt->execute();

            // Fetch the row from the result.
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    $dm = new Datamule();
    $acData = $dm->getData();