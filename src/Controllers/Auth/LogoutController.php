<?php

namespace Ductong\BaseMvc\Controllers\Auth;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\User;

class LogoutController extends Controller
{
    public function __construct() {
        check_auth();
    }

    /*
        Đây là hàm hiển thị danh sách user
    */
    public function logout() {
        unset($_SESSION['user']);

        header('Location: /');
    }
}
