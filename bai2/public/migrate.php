<?php
    include_once '../app/config.php';
    
    $emailacc = 'huydinhvan132@gmail.com';
    $passwordacc = '1';
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            )');

        $sql = "INSERT INTO users (email, password) VALUES (:email, :hashedPassword)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $emailacc, PDO::PARAM_STR);
        
        $hashedPassword = password_hash($passwordacc, PASSWORD_DEFAULT);
        $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();
            
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo "Lỗi :".$sql . "<br/>" . $e->getMessage();
      }
      
      $conn = null;
?>