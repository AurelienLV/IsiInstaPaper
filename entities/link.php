<?php //link.php
require_once __DIR__.'/person.php'; //a link has a repertory
require_once __DIR__.'/repertory.php'; //a link has a repertory

/**
 * IsiInstaPaper must allow storage of links for an user
 */
class Link {

    private $id; //Link's id
    private $title; //a link has a title
    private $content; //a link has a content
    private $creationDate; //a link has a date (new date when edited link)
    private $url; //a link has an url
    private $video; //a link can be a video (boolean)
    private $repertory; //a link has a "Repertory" which can be Home or Archive
    private $liked; //a link can be liked (boolean)
    private $note; //a link can be comment
    private $person; //a link belows to an user
    
    //To instance a link just has an url
    public function __construct($url) {
        $this->url = $url;
    }
    
    function getId() {
        return $this->id;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    public function getUrl() {
        return $this->url;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
    }

    public function isVideo() {
        return $this->video;
    }
    
    public function setVideo($video) {
        if(is_bool($video)) {
            $this->video = $video;
        }
    }

    public function getRepertory() {
        return $this->repertory;
    }

    public function setRepertory($repertory) {
        $this->repertory = $repertory;
    }
    
    public function isLiked() {
        return $this->liked;
    }

    public function setLiked($liked) {
        if(is_bool($liked)) {
            $this->liked = $liked;
        }
    }

    public function getNote() {
        return $this->note;
    }
    
    public function setNote($note) {
        $this->note = $note;
    }
    
    function getPerson() {
        return $this->person;
    }
    
}