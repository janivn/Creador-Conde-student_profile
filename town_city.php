<?php
include_once("db.php"); // Include the Database class file

class TownCity { 
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function create($data) {
        try {
            // Prepare the SQL INSERT statement
            $sql = "INSERT INTO town_city(name) VALUES(:name)";
            $stmt = $this->db->getConnection()->prepare($sql);

            // Bind values to placeholders
            $stmt->bindParam(':name', $data['name']);

            // Execute the INSERT query
            $stmt->execute();

            // Check if the insert was successful
            if($stmt->rowCount() > 0)
            {
                return $this->db->getConnection()->lastInsertId();
            }

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function read1($id) {
        $sql = "SELECT * FROM town_city";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($id) {
        try {
            $connection = $this->db->getConnection();

            $sql = "SELECT * FROM town_city WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            // Fetch the student data as an associative array
            $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

            return $studentData;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    

    public function update1($id, $data) {
        // Fix: Use `id` instead of `townId` for the column name
        $sql = "UPDATE town_city SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name',$data['name']);
        $stmt->execute();
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE town_city SET name = :name WHERE id = :id";
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

    public function delete($townId) {
        // Fix: Use `id` instead of `townId` for the column name
        $sql = "DELETE FROM town_city WHERE id = :townId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':townId', $townId);
        $stmt->execute();
    }
    public function getAll() {
        try {
            $sql = "SELECT * FROM town_city LIMIT 10";
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

