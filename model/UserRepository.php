<?php

/**
 * Description of ResourceRepository
 *
 * @author fede
 */

require_once('./model/PDORepository.php');
class UserRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function auth($user, $pass) {

        $answer = $this->queryExists(
                "SELECT 'authed' FROM usuario WHERE usuario=? and password=?;", [$user, $pass]);

        return $answer;
    }

    public function salt($user) {

        $mapper = function($row) {
            return hash("sha256",$row['fecha_registracion']);
        };

        $answer = $this->queryFirst(
                "SELECT fecha_registracion FROM usuario WHERE usuario=?;", [$user], $mapper);

        return $answer;
    }

    public function getId($user) {

        $mapper = function($row) {
            return $row['id'];
        };

        $answer = $this->queryFirst(
                "SELECT id FROM usuario WHERE usuario=?;", [$user], $mapper);

        return $answer;
    }
}
