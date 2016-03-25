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
   public function save($url, $content, $title, $idrep, $video) {
       $date = date('d-m-Y H:i');
       $videoStr = $video?"true":"false";
       $idrepStr = $idrep==null?'NULL':strval($idrep);
       $query = "INSERT INTO link (id, title, content, creationdate, url,"
              . "video, liked, note, idrepertory) "
              . "VALUES(NULL,'".$title."','".$content."',".$date.","
              . "'".$url."',".$videoStr.",false,NULL,$idrepStr)";
       print_r($query);
       $this->connection->executeQuery($query);
   }
}