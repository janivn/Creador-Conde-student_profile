<?php
include_once("db.php"); // Include the Database class file

class Province {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM province";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    public function create($data) {
        try {
            $sql = "INSERT INTO province (name) VALUES (:name)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':name', $data['name']);
            $stmt->execute();

            // Return the ID of the newly inserted record
            return $this->db->getConnection()->lastInsertId();
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e;
        }
    }
    public function read($id) {
        try {
            $connection = $this->db->getConnection();

            $sql = "SELECT * FROM province WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            // Fetch the student data as an associative array
            $prov = $stmt->fetch(PDO::FETCH_ASSOC);

            return $prov;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    public function update($id, $data) {
        try {
            $sql = "UPDATE province SET name = :name WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $data['name']);
            $stmt->execute();

            // Return true if the update is successful
            return true;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e;
        }
    }
    public function delete($id) {
        try {
            $sql = "DELETE FROM province WHERE id = :id";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Return true if the deletion is successful
            return true;
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e;
        }
    }
}
?>
