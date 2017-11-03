<?php

/**
 * Description of ResourceController
 *
 * @author fede
 */
require_once('./model/PostRepository.php');
require_once('LoginController.php');
require_once('./view/PostCreation.php');
require_once('./view/PostList.php');
require_once('./view/PostView.php');
class PostController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }
    
    
    public function basicView(){
        $posts = PostRepository::getInstance()->listAll();
        $view = new PostList();
        $view->show(["posts" => $posts]);
    }
    
    public function singleView(){
        if(isset($_GET["postId"])){
            $post = PostRepository::getInstance()->getPost($_GET["postId"]);
            if($post !== false){
                $view = new PostView();
                $view->show(["post" => $post]);            
            }else{
                $this->basicView();
            }
        }else{
            $this->basicView();
        }
    }

    public function createView(){
        $view = new PostCreation();
        $view->show();
    }

    public function create(){

        $userLogued = Validator::userLogued();

        if($userLogued){
            date_default_timezone_set('UTC');

            $dataArray = [
                ":titulo" => $_POST['title'],
                ":pregunta" => $_POST['text'],
                ":fecha_creacion" => date('Y-m-d H:i:s'), 
                ":id_usuario" => UserRepository::getInstance()->getId($userLogued)
            ];

            if(isset($dataArray[":titulo"]) && isset($dataArray[":pregunta"])){
                PostRepository::getInstance()->create($dataArray);
                $this->basicView();
            }else{
                $view = new PostCreation();
                $view->show(['title' => $_POST['title'], 'text' => $_POST['text']]);                        
            }            
        }else{
            LoginController::basicView();
        }
    }
}
