<?php
require_once '/../model/personFinder.php';
require_once '/../model/personGateway.php';
require_once '/../model/linkFinder.php';
require_once '/../model/linkGateway.php';
require_once '/../model/repertoryFinder.php';
require_once '/../model/repertoryGateway.php';

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
    
    public function getArrayVar() {
        return $this->arrayVar;
    }
    
    public function manage() {
        if(filter_input(INPUT_POST, 'link') != null) {
            $this->getHTTP(filter_input(INPUT_POST, 'link'));
        }
        else if(filter_input(INPUT_POST, 'add_repertory') != null) {
            
        }
    }
    
    private function getHTTP($link) {
        // Initiate the curl session
        $ch = curl_init();
        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $link);
        // Allow the headers
        curl_setopt($ch, CURLOPT_HEADER, false);
        // Return the output instead of displaying it directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute the curl session
        $output = curl_exec($ch);
        // Close the curl session
        curl_close($ch);
        
        $var = $this->prepareSave($output, $link);
        $video = false;
        $idrep = filter_input(INPUT_GET, 'rep') != null ?
                filter_input(INPUT_GET, 'rep') : null;
        LinkGateway::getInstance()->save(
                $link,
                $var['html'],
                $var['title'],
                $idrep,
                $video);
    }
    
    private function prepareSave($content, $link) {
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($content);
        //Images
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $image->setAttribute('src', $link . $image->getAttribute('src'));
        }
        $html = $dom->saveHTML();
        //Title
        $title = $dom->getElementsByTagName('title')[0]->nodeValue;
        return ['html' => $html, 'title' => $title];
    }
    
}