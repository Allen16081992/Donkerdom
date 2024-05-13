<?php 
    // Load Database connection
    require_once './config/database.config.php'; // PDO
    require_once './config/session_manager.config.php'; // Session

    class GetData {

        public function fetch_AllMembers() {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare SQL statement.
            $stmt = $db->connect()->prepare('SELECT userID, username, firstname, lastname, email, user_level FROM members;');          
            $stmt->execute();

            // Fetch the row from the result.
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function fetch_MemberInfo($userID) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare SQL statement.
            $stmt = $db->connect()->prepare('SELECT username, firstname, lastname, email, user_level FROM members WHERE userID = ?;');

            // Verify if executing as an array is valid
            if(!$stmt->execute([$userID])) {
                $stmt->execute($userID);
            }

            // Fetch the row from the result.
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        public function fetch_AllSubjects() {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();  

            $stmt = $db->connect()->prepare('SELECT * FROM subjects;');
            $stmt->execute();

            // Fetch the row from the result.
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function fetch_Subject() {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance(); 

            $stmt = $db->connect()->prepare('SELECT * FROM subjects WHERE active = 1 LIMIT 1');
            $stmt->execute();
           
            // Fetch the row from the result.
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    $dm = new GetData();
    $acData = $dm->fetch_AllMembers();
    $subData = $dm->fetch_AllSubjects();
    $item = $dm->fetch_Subject();