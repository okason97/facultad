<?php

/**
 * Description of ResourceRepository
 *
 * @author fede
 */
require_once('PDORepository.php');
require_once('Post.php');
class PostRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function listAll() {

        $mapper = function($row) {
            $post = new Post($row['id'], $row['titulo'], $row['pregunta'], $row['fecha_creacion'], $row['id_usuario']);
            return $post;
        };

        $answer = $this->queryList(
                "SELECT * FROM preguntas_usuario;", [], $mapper);

        return $answer;
    }

    public function getPost($id) {

        $mapper = function($row) {
            $post = new Post($row['id'], $row['titulo'], $row['pregunta'], $row['fecha_creacion'], $row['id_usuario']);
            return $post;
        };

        $answer = $this->queryFirst(
                "SELECT * FROM preguntas_usuario WHERE id=?;", [$id], $mapper);

        return $answer;
    }

    public function create($dataArray) {

        $answer = $this->queryExecute(
                "INSERT INTO preguntas_usuario (titulo, pregunta, fecha_creacion, id_usuario) 
                VALUES (:titulo, :pregunta, :fecha_creacion, :id_usuario);", $dataArray);

        echo $dataArray[":titulo"]."/";
        echo $dataArray[":pregunta"]."/";
        echo $dataArray[":fecha_creacion"]."/";
        echo $dataArray[":id_usuario"]."/";
    }
}
