<?php

namespace Ductong\BaseMvc\Controllers\Auth;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\User;

class LoginController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function showForm() {
        $this->render('auth/login');
    }

    public function handleLogin() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = (new User)->getUserByEmailPassword($email, $password);

        $_SESSION['user'] = $user;

        if ($user['is_admin']) {
            header('Location: /admin/dashboard');
            exit();
        }

        header('Location: /');
        exit();
    }
}
