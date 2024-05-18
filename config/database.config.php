<?php 
    // Database Configuration
    require_once 'db/config.db.php';

    class Database {
        private static $dbInstance;
        private $dbInvoke;

        // Establish a database connection once during instantiation to reduce overhead.
        private function __construct() {
            try { 
                // Establish a PDO database connection
                $this->dbInvoke = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD,
                    // Prevent charset encoding injections.
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
                );
            } catch (PDOException $e) {
                error_log("Failed to connect to the database: " . $e->getMessage(), 0);
                throw new Exception("Failed to connect to the database. MySQL may have crashed.");
            }
        }

        // Singleton pattern: global access point to a single instance.
        public static function getInstance() {
            if (!self::$dbInstance) {
                self::$dbInstance = new self();
            }
            return self::$dbInstance;
        }

        // Return the PDO instance for database operations to reduce memory and server load.
        public function connect() {
            return $this->dbInvoke;
        }
    }