<?php



/**
 * Description of Resource
 *
 * @author fede
 */
class User {
    
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT, -- Clave primaria
    `usuario` varchar(50) NOT NULL,
    `clave` varchar(255) NOT NULL,
    `nombre` varchar(100) NOT NULL,
    `apellido` varchar(100) NOT NULL,
    `mail` varchar(45) NOT NULL,
    `pais` varchar(45) DEFAULT NULL,
    `fecha_registracion` datetime NOT NULL    
    private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $mail;
    private $country;
    private $registerDate;
    
    public function __construct($id, $username, $firstName, $lastName, $mail, $country, $registerDate) {
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->mail = $mail;
        $this->country = $country;
        $this->registerDate = $registerDate;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getRegisterDate() {
        return $this->registerDate;
    }
}
