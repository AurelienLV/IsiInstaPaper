<?php //repertory.php
require_once __DIR__.'/person.php'; //a repertory belows to an user

/*
 * A link is in a repertory
 */
class Repertory {
    
    private $id; //Repertory's id
    private $name; //a repertory has a name
    private $forever; //a repertory can be no deletable (boolean)
    private $bookmarklet; //a repertory can provide a bookmarklet (boolean)
    private $person; //a repertory belows to an user
    
    //To instance a repertory just has a name
    //Directories "Home" and "Archive" (enum) aren't deletable
    public function __construct($name, $forever, $bookmarklet) {
        $this->name = $name;
        //forever must be a boolean
        if(is_bool($forever)) {
            $this->forever = $forever;
        }
        else {
            $forever = false;
        }
        if(is_bool($bookmarklet)) {
            $this->bookmarklet = $bookmarklet;
        }
        else {
            $bookmarklet = false;
        }
    }
    
    function getId() {
        return $this->id;
    }
    
    function getName() {
        return $this->name;
    }
    
    function setName($name) {
        $this->name = $name;
    }

    function isForever() {
        return $this->forever;
    }
    
    function setForever($forever) {
        $this->forever = $forever;
    }

    function isBookmarklet() {
        return $this->bookmarklet;
    }
    
    function setBookmarklet($bookmarklet) {
        if(is_bool($bookmarklet)) {
            $this->bookmarklet = $bookmarklet;
        }
    }

    function getPerson() {
        return $this->person;
    }
    
}