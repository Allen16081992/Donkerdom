<?php // Dhr. Allen Pieter
    // Database Configuration
    require_once 'db/config.db.php';

    class Database {
        private static $dbInstance;
        private $dbInvoke;

        // Constructor: Establishes a database connection once during object instantiation,
        // reducing overhead associated with creating a new connection for each operation.
        private function __construct() {
            try { 
                // Establish a PDO database connection
                $this->dbInvoke = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD,
                    //Deny charset encoding injections that could cause SQL injections with and without prepared statements.
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
                );
            } catch (PDOException $e) {
                // Log the exception details
                error_log("Failed to connect to the database: " . $e->getMessage(), 0);
                // Throw a custom exception with a user-friendly message
                throw new Exception("Failed to connect to the database. MySQL may have crashed.");
            }
        }

        // Allow subclasses to access the 'static' method directly.
        // Provide a global access point for creating a single instance of the class (Singleton pattern).
        public static function getInstance() {
            if (!self::$dbInstance) {
                self::$dbInstance = new self();
            }
            return self::$dbInstance;
        }

        // Method to get the PDO instance for database operations
        // By re-using the current database connection, we can manage memory usage and server load more efficiently.
        public function connect() {
            return $this->dbInvoke;
        }
    }