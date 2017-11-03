<?php

/**
 * El controllador del login
 *
 * @author gaston
 */

require_once('./view/Login.php');
require_once('PostController.php');
require_once('Validator.php');

class LoginController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }
    
    public function login(){
        if(!Validator::userLogued()){
            if(isset($_POST['username'])){
                if(isset($_POST['password'])){
                    if(preg_match('/^[A-Za-z0-9]*$/', $_POST['username'])){
                        if(Validator::auth($_POST['username'], $_POST['password'])){
                            Validator::userLogin($_POST['username']);                                            
                            PostController::createView();
                        }else{
                            $view = new Login();
                            $view->show([
                                'password' => $_POST['password'], 
                                'username' => $_POST['username']]);                                           
                        }
                    }else{
                        $view = new Login();
                        $view->show([
                            'password' => $_POST['password'], 
                            'username' => $_POST['username']]);                   
                    }
                }else{
                    $view = new Login();
                    $view->show(['password' => $_POST['password']]);                                        
                }
            }else{
                $view = new Login();
                $view->show(['username' => $_POST['username']]);                        
            }
        }else{
            PostController::basicView();
        }
    }
    
    public function basicView(){
        if(Validator::userLogued()){
            PostController::basicView();
        }else{
            $view = new Login();
            $view->show();            
        }
    }

    public function logout(){
        Validator::logout();
        $this->basicView();
    }
    
}