<?php
require_once 'connection.php';
require_once '/../entities/person.php';
require_once '/../entities/link.php';
require_once '/../entities/repertory.php';

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
   public function save($url) {
       $query = "INSERT INTO link (id, title, content, creationDate, url,"
              . "video, liked, note, idrepertory) "
              . "VALUES(".$url.");
       $this->connection->executeQuery($query);
   }
}