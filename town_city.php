<?php
include_once("db.php"); // Include the Database class file

class TownCity { 
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function create($townName) {
        // Fix: Use `id` instead of `townId` for the column name
        $sql = "INSERT INTO town_city (id, name) VALUES (:id, :townName)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':townName', $townName);
        $stmt->execute();
    }

    public function read() {
        $sql = "SELECT * FROM town_city";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($townId, $townName) {
        // Fix: Use `id` instead of `townId` for the column name
        $sql = "UPDATE town_city SET townName = :townName WHERE id = :townId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':townId', $townId);
        $stmt->bindParam(':townName', $townName);
        $stmt->execute();
    }

    public function delete($townId) {
        // Fix: Use `id` instead of `townId` for the column name
        $sql = "DELETE FROM town_city WHERE id = :townId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':townId', $townId);
        $stmt->execute();
    }
    public function getAll() {
        try {
            $sql = "SELECT * FROM town_city";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

}
?>

