<?php
require_once 'connection.php';

/**
 * Row Data Gateway : Link's gateway
 * Singleton 
 */
class LinkGateway {
    
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        $this->connection = Connection::getInstance();
    }
    
    public static function getInstance() {
     if(is_null(self::$instance)) {
       self::$instance = new LinkGateway();  
     }
     return self::$instance;
   }
   
   //Gateway only. Usage : $this->connection->executeQuery('query')

}