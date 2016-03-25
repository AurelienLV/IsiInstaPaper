<?php
require_once 'connection.php';
require_once '/../entities/person.php';
require_once '/../entities/link.php';
require_once '/../entities/repertory.php';

/**
 * Row Data Gateway : Person's gateway
 * Singleton
 */
class PersonGateway {

    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = Connection::getInstance();
    }

    public static function getInstance() {
     if(is_null(self::$instance)) {
       self::$instance = new PersonGateway();  
     }
     return self::$instance;
   }

   //Gateway only. Usage : $this->connection->executeQuery('query')
   public function save($email, $passwordHash) {
       $query = "INSERT INTO person (id, email, passwordHash, username, avatar) "
              . "VALUES(NULL, '".$email."', '".$passwordHash."', NULL, NULL)";
       $this->connection->executeQuery($query);
   }
   
}
