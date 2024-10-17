<?php
// controllers/UserController.php
require_once __DIR__.'/../config/config.php';
require_once __DIR__.'/../models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }
    public function register($username, $password, $role) {
      
        return $this->userModel->register($username, $password, $role);
    }
    public function login($username, $password) {
        // Fetch the user from the database
        $user = $this->userModel->getUserByUsername($username);

        // Check if user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            // You can set session variables here

                session_start();
            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }

        return false;
    }
}
