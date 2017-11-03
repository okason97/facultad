<?php

/**
 * A post view
 *
 * @author gaston
 */


require_once('TwigView.php');
class PostView extends TwigView {
    
    public function show($data) {
        
        echo self::getTwig()->render('post.html.twig', Validator::dataArray() + $data);        
        
    }
    
}
