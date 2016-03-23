<?php
require_once 'connection.php';

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
}
