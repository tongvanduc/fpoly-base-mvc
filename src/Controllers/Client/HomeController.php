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
        $getAllByCategoryID = (new Product)->getAllByCategoryID(1);

        echo "<pre>";
        echo "<h1>Lấy 10 sản phẩm mới nhất</h1>";
        print_r($getLatestLimit10);

        echo "<h1>Lấy tất cả sản phẩm theo ID Danh mục</h1>";
        print_r($getAllByCategoryID);
        die;

        $this->render('client/home');
    }
}
