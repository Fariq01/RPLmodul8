<?php
    include_once '../config/Database.php';
    
    Class LoginModel {
        private $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->connect();
        }

        public function verifyUser($email, $password) {
            $query = 'SELECT email, password FROM user WHERE email = :email'; 
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false; 
            }
        }
    }
?>