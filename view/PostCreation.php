<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */


require_once('TwigView.php');
class PostCreation extends TwigView {
    
    public function show($data) {
        
        if(isset($data)){
	        echo self::getTwig()->render('createPost.html.twig', Validator::dataArray() + $data);                	
        }else{        	
	        echo self::getTwig()->render('createPost.html.twig', Validator::dataArray());                	
        }
        
    }
    
}
