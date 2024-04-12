<?php // Dhr. Allen Pieter
    // Load Database connection
    require_once '../config/database.config.php'; // PDO
    require_once '../config/session_manager.config.php'; // Session
    require_once '../controllers/controller_traits.control.php'; // Rebounds

    class Delete {
        use Rebounds;

        // Update the new member in the Database
        protected function unsetMember($formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare the SQL statement.
            $stmt = $db->connect()->prepare('DELETE FROM members WHERE userID = :userID');
            $stmt->bindParam(":userID", $formFields['uid']);
            $stmt->execute(); 
        
            // Set success message in session
            $_SESSION['success'] = 'Lid verwijderd';

            // Head to the council page.
            $this->reboundPath('location: ../council.php');
        } 
        
        protected function eraseMember($formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare the SQL statement.
            $stmt = $db->connect()->prepare('DELETE FROM members WHERE userID = :userID');
            $stmt->bindParam(":userID", $formFields['uid']);
            $stmt->execute(); 

            // Goodbye
            $this->reboundPath('location: ../goodbye.html');
        } 
    }