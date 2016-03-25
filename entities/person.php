<?php //user.php
require_once __DIR__.'/link.php'; //an user can have an array of links
require_once __DIR__.'/repertory.php'; //an user can have an array of links

/**
 * To use IsiInstaPaper, an user must have an email and a password
 */
class Person {
    
    private $id; //Person's id
    private $email; //an user has an email
    private $passwordHash; //an user has an protected password
    private $username; //an user can have an username
    private $links; //an user can have an array of links
    private $repertories; //an user can have several "Repertory"
    private $avatar; //an user can have a picture as avatar
    
    //To instance an user just has an email and a password (as InstaPaper)
    public function __construct($id, $email, $passwordHash, $username, $avatar){
        $this->links = array();
        $this->repertories = array();
        $this->id = $id;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->username = $username;
        $this->avatar = $avatar;
    }
    
    function getId() {
        return $this->id;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getPasswordHash() {
        return $this->passwordHash;
    }
    
    public function setPasswordHash($passwordHash) {
        $this->passwordHash = $passwordHash;
    }

    public function getUsername() {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getLinks() {
        return $this->links;
    }
    
    public function getRepertories() {
        return $this->repertories;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }
    
}