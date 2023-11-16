<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\User;

class UserController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $users = (new User)->all();
        
        $this->renderAdmin('users/index', ['users' => $users]);
    }

    public function create() {
        if (isset($_POST['btn-submit'])) { 
            $data = [
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];

            (new User)->insert($data);

            header('Location: /admin/users');
        }

        $this->renderAdmin('users/create');
    }

    public function update() {
        if (isset($_POST['btn-submit'])) { 
            $data = [
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];

            $conditions = [
                ['id', '=', $_GET['id']]
            ];

            (new User)->update($data, $conditions);
        }

        $user = (new User)->findOne($_GET['id']);

        $this->renderAdmin('users/update', ['user' => $user]);
    }

    public function delete() {
        $conditions = [
            ['id', '=', $_GET['id']]
        ];

        (new User)->delete($conditions);

        header('Location: /admin/users');
    }
}
