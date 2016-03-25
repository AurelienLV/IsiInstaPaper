<?php
require_once 'connection.php';
require_once '/../entities/person.php';
require_once '/../entities/link.php';
require_once '/../entities/repertory.php';

/**
 * Row Data Gateway : Person's finders
 * Singleton 
 */
class PersonFinder {
    
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        $this->connection = Connection::getInstance();
    }
    
    public static function getInstance() {
     if(is_null(self::$instance)) {
       self::$instance = new PersonFinder();  
     }
     return self::$instance;
   }
   
   //Finders only. Usage : $this->connection->executeQuery('query')
   public function findByEmailAndPwd($email, $pwdHash) {
       $query = "SELECT * "
              . "FROM person "
              . "WHERE email = '" . $email . "' "
              . "AND passwordHash = '" . $pwdHash . "' "
              . "LIMIT 1";
       $userQuery = $this->connection->executeQuery($query);
       if(!empty($userQuery)) {
            $user = new Person(
               $userQuery[0]['id'],
               $userQuery[0]['email'],
               $userQuery[0]['passwordHash'],
               $userQuery[0]['username'],
               $userQuery[0]['avatar']
               );
       }
       else {
           $user = null;
       }
       return $user;
   }
   
   public function findByEmail($email) {
       $query = "SELECT * "
              . "FROM person "
              . "WHERE email = '" . $email . "' "
              . "LIMIT 1";
       $userQuery = $this->connection->executeQuery($query);
       if(!empty($userQuery)) {
           $bool = true;
       }
       else {
           $bool = false;
       }
       return $bool;
   }
   
}