<?php

/**
 * Controller for links view
 */
class LinksController {
    
    private static $instance;
    private $arrayVar;
    
    private function __construct() {      
        $this->arrayVar = array(
            'repertories' => array(
                'lala', 'po'
            ),
            'idrepertory' => 0,
            'avatar' => "http://www.progarchives.com/forum/uploads/823/Martian.jpg",
            'email' => "blabla@gmail.com",
            'username' => "Blabla",
            'repertory_name' => "Harry Potter",
            'links' => array(
                'tinky', 'winky', 'dipsy'
            ),
            'title_link' => "Tinky Winky",
            'url_link' => "http://www.lien.fr",
            'content_part' => "bibcze fhzebi eifziehf uzhefize ifhizehfzeif",
            'date_link' => "14/03/2016",
            'idlink' => 0,
            'idrep' => 0
        );
    }
    
    public static function getInstance() {
        if(is_null(self::$instance)) {
            self::$instance = new LinksController();  
        }
        return self::$instance;
    }
    
    function getArrayVar() {
        return $this->arrayVar;
    }
    
}