<?php

namespace Ductong\BaseMvc\Controllers\Client;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Product;

class HomeController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $getLatestLimit10 = (new Product)->getLatestLimit10();
        $getAllByCategoryID = (new Product)->getAllByCategoryID($_GET['category_id'] ?? 1);

        $this->render('client/home');
    }
}
