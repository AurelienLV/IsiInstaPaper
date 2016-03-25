<?php
require_once 'connection.php';
require_once '/../entities/person.php';
require_once '/../entities/link.php';
require_once '/../entities/repertory.php';

/**
 * Row Data Gateway : Link's finders
 * Singleton 
 */
class LinkFinder {
    
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        $this->connection = Connection::getInstance();
    }
    
    public static function getInstance() {
     if(is_null(self::$instance)) {
       self::$instance = new LinkFinder();  
     }
     return self::$instance;
   }
   
   //Finders only. Usage : $this->connection->executeQuery('query')

}