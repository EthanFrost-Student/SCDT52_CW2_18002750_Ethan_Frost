<?php

class ReviewController {

    protected $db;

    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
    }

    public function get_review_by_id(int $id)
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

    public function delete_review(int $id)
    {
        $sql = "DELETE FROM reviews WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->execute();
    }

    public function register_review(array $review)
    {
        try {

            $sql = "INSERT INTO reviews(username, comment)
                    VALUES (:username, :comment)"; 

            $this->db->runSQL($sql, $review)->execute();
            return true;

        } catch (PDOException $e) {

            if ($e->getCode() == 23000) { //Could be 1062
                return false;
            }
            throw $e;
        }
    }   


}
?>