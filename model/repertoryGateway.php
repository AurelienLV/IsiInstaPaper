<?php
require_once 'connection.php';
require_once '/../entities/person.php';
require_once '/../entities/link.php';
require_once '/../entities/repertory.php';

/**
 * Row Data Gateway : Repertory's gateway
 * Singleton 
 */
class RepertoryGateway {
    
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        $this->connection = Connection::getInstance();
    }
    
    public static function getInstance() {
     if(is_null(self::$instance)) {
       self::$instance = new RepertoryGateway();  
     }
     return self::$instance;
   }
   
   //Gateway only. Usage : $this->connection->executeQuery('query')

}