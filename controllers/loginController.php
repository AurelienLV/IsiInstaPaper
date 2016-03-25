<?php
require_once '/../model/personFinder.php';
require_once '/../model/personGateway.php';
require_once '/../model/linkFinder.php';
require_once '/../model/linkGateway.php';
require_once '/../model/repertoryFinder.php';
require_once '/../model/repertoryGateway.php';

/**
 * Controller for login view
 */
class LoginController {
    
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
            'idrep' => 0,
            'error_message' => ""
        );
    }
    
    public static function getInstance() {
        if(is_null(self::$instance)) {
            self::$instance = new LoginController();  
        }
        return self::$instance;
    }
    
    function getArrayVar() {
        return $this->arrayVar;
    }
    
    public function authentification() {
        if(filter_input(INPUT_POST, 'person_signin',
                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) != null) {
            $user = PersonFinder::getInstance()->findByEmailAndPwd(
                    filter_input(INPUT_POST, 'person_signin', 
                            FILTER_DEFAULT, FILTER_REQUIRE_ARRAY)['email'],
                    hash("sha256", 
                            filter_input(INPUT_POST, 'person_signin',
                                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY)['pwd']
                            )
                    );
            if($user != null) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;               
            }
            else {
                $this->arrayVar['error_message'] = "Authentification failed";
            }
        }
        else if (filter_input(INPUT_POST, 'person_signup',
                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) != null) {
            $exists = PersonFinder::getInstance()->findByEmail(
                    filter_input(INPUT_POST, 'person_signup', 
                            FILTER_DEFAULT, FILTER_REQUIRE_ARRAY)['email']);
            if($exists) {
                $this->arrayVar['error_message'] = "Email already exists";
            }
            else {
                PersonGateway::getInstance()->save(
                        filter_input(INPUT_POST, 'person_signup', 
                            FILTER_DEFAULT, FILTER_REQUIRE_ARRAY)['email'],
                    hash("sha256", 
                            filter_input(INPUT_POST, 'person_signup',
                                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY)['pwd']));
            }
        }
    }
}