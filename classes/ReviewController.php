<?php

class ReviewController {

    protected $db;

    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
    }

    public function get_reviews_by_id(int $id)
    {
        $sql = "SELECT * FROM reviews WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->fetch();
    }

    public function get_all_reviews()
    {
        $sql = "SELECT * FROM reviews";
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function delete_reviews(int $id)
    {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->execute();
    }

    public function create_reviews(array $reviews) 
    {
        
        $sql = "INSERT INTO reviews(username, comment)
        VALUES (:username, :comment);";
        $this->db->runSQL($sql, $reviews);
        return $this->db->lastInsertId();
    }   


}
?>