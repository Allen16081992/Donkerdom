<?php 
    // Load Database connection
    require_once '../config/database.config.php'; // PDO
    require_once '../config/session_manager.config.php'; // Session
    require_once '../controllers/controller_traits.control.php'; // Rebounds

    class Delete {
        use Rebounds;

        // Delete the member from the Database
        protected function unsetMember($formFields, $operator) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare the SQL statement.
            $stmt = $db->connect()->prepare('DELETE FROM members WHERE userID = :userID');
            $stmt->bindParam(":userID", $formFields['uid']);
            $stmt->execute();

            $stmt = null;
            $stmt = $db->connect()->prepare("SELECT COUNT(*) FROM members WHERE userID = :userID");
            $stmt->bindParam(":userID", $formFields['uid']);
            $stmt->execute();

            // Verify if anything was removed
            $count = $stmt->fetchColumn();
            if ($count > 0) {
                $count = null;
                // message by sessions instead of URL parsing.
                $_SESSION['error'] = 'Failed to delete Member';

                // Head to the council page.
                $this->reboundPath('location: ../council.php');
            }

            // Redirect current operator to a location
            if ($operator == 'admin') {
                // Set success message in session
                $_SESSION['success'] = 'Lid verwijderd';

                // Head to the council page.
                $this->reboundPath('location: ../council.php');

            } else {
                // Wipe everything session related, say goodye
                session_unset(); session_destroy();
                $this->reboundPath('location: ../goodbye.html');
            }
        }

        protected function unsetItem($formFields) {
            // Get the singleton instance of the Database class to establish a database connection.
            $db = Database::getInstance();

            // Prepare the SQL statement.
            $stmt = $db->connect()->prepare('DELETE FROM subject_options WHERE subjectID = :item_ID');
            $stmt->bindParam(":item_id", $formFields['item_id']);
            $stmt->execute();

            $stmt = $db->connect()->prepare('DELETE FROM subjects_results WHERE subjectID = :item_ID');
            $stmt->bindParam(":item_id", $formFields['item_id']);
            $stmt->execute();

            $stmt = $db->connect()->prepare('DELETE FROM subjects WHERE id = :item_ID');
            $stmt->bindParam(":item_id", $formFields['item_id']);
            $stmt->execute();
        }
    }