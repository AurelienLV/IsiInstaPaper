<?php
/**
 * Singleton
 */
Class Connection {
    
    private static $instance = null;
    private $dsn;
    private $con;
    
    private function __construct() {
        $this->dsn = 'mysql:host=localhost;dbname=isiinstapaper';
        $this->con = new PDO($this->dsn, 'admin', 'admin');
    }
    
    public static function getInstance() {
     if(is_null(self::$instance)) {
       self::$instance = new Connection();  
     }
     return self::$instance;
   }
   
   public function executeQuery($query) {
       $stmt = $this->con->prepare($query);
       $stmt->execute();
       $result = $stmt->fetchAll();
       return $result;
   }

}