<?php

/**
 * Login view
 *
 * @author gaston
 */


require_once('TwigView.php');
class Login extends TwigView {
    
    public function show($data) {
        
        if(isset($data)){
	        echo self::getTwig()->render('login.html.twig', Validator::dataArray() + $data);                	
        }else{        	
	        echo self::getTwig()->render('login.html.twig', Validator::dataArray());                	
        }
        
    }
    
}
