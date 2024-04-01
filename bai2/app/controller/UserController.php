<?php
include_once "../app/model/User.php";
class UserController {

    public function login() {
        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usermodel = new User();
            $user = $usermodel->getUserByEmail($email);
        }

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['login_error'] = 'Invalid email or password';
            return;
        }
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        header('Location: /Homepage.php');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /Login.php');
        exit;
    }
}