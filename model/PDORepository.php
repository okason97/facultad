<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDORepository
 *
 * @author fede
 */
abstract class PDORepository {
    
    const USERNAME = "root";
    const PASSWORD = "pass";
	const HOST ="localhost";
	const DB = "prueba";
    
    
    private function getConnection(){
        $u=self::USERNAME;
        $p=self::PASSWORD;
        $db=self::DB;
        $host=self::HOST;
        $connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
        return $connection;
    }
    
    protected function queryList($sql, $args, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $list = [];
        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        return $list;
    }

    protected function queryFirst($sql, $args, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $element = $stmt->fetch();
        if (isset($element)) {
            return $mapper($element);
        } else {
            return false;
        }
    }
    
    protected function queryExists($sql, $args){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $element = $stmt->fetch();
        if (isset($element)) {
            return true;
        } else {
            return false;
        }
    }

    protected function queryExecute($sql, $args){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
    }
}
