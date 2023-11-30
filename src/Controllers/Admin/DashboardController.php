<?php

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        check_auth();
    }
    
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {        
        $this->renderAdmin('dashboard');
    }
}
