<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */

require_once('TwigView.php');
class PostList extends TwigView {
    
    public function show($data) {
        
        echo self::getTwig()->render('listPosts.html.twig', Validator::dataArray() + $data);
        
    }
    
}
