<?php
// models/RestaurantModel.php
class RestaurantModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Method to get a restaurant by ID
    public function getRestaurantById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM restaurants WHERE id = :id');  // Prepare query
        $stmt->execute(['id' => $id]);  // Bind the ID
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch restaurant data
    }
    //get all restaurent 
    public function getAllRestaurants() {
        $stmt = $this->pdo->prepare("SELECT * FROM restaurants"); // Fetch all records
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all results as an associative array
    }
    //to fetch the cover image 
    public function getRestaurantDetailsById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM restaurants WHERE id = :id');  // Prepare query to get restaurant details
        $stmt->execute(['id' => $id]);  // Bind the restaurant ID
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch details of the restaurant
    }
}    
