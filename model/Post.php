<?php



/**
 * Post item
 *
 * @author gaston
 */
class Post {
    
    private $id;
    private $title;
    private $text;
    private $creationDate;
    private $userId;    
    
    public function __construct($id, $title, $text, $creationDate, $userId) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->creationDate = $creationDate;
        $this->userId = $userId;
    }

	// Getters

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function getUserId() {
        return $this->userId;
    }
}
