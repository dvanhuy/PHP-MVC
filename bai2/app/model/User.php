<?php

class User
{
    private $email;
    private $password;
    private $db;


    public function __construct()
    {
        include_once '../app/config.php';
        $this->db = new PDO("mysql:host=".$servername.";dbname=".$dbname."", $username, $password);
        $this->db->exec('CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )');
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    // public function all()
    // {
    //     // Lấy tất cả user từ database
    //     $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    //     $stmt = $db->query('SELECT * FROM users');
    //     return $stmt->fetchAll();
    // }

    public function save()
    {
        // Lưu user vào database
        $stmt = $this->db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        $stmt->execute([$this->email, $this->password]);
    }
}