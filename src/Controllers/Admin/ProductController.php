<?php 

namespace Ductong\BaseMvc\Controllers\Admin;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Category;
use Ductong\BaseMvc\Models\Product;

class ProductController extends Controller {

    /* Lấy danh sách */
    public function index() {
        $products = (new Product())->all();
        $categories = (new Category())->all();

        // Mảng này có cấu trúc, key là id danh mục, value là tên danh mục
        // Tạo ra mảng này để hiển thị tên danh mục sản phẩm ở danh sách
        $arrayCategoryIdName = [];
        foreach ($categories as $category) {
            $arrayCategoryIdName[$category['id']] = $category['name'];
        }

        $this->renderAdmin("products/index", 
            [
                "products" => $products, 
                "arrayCategoryIdName" => $arrayCategoryIdName
            ]
        );
    }

    /* Thêm mới */
    public function create() {
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'price_sale' => $_POST['price_sale'] ?: 0,
                'description' => $_POST['description'],
                'is_active' => $_POST['is_active'],
            ];

            $data['img'] = null;
            $img = $_FILES['img'] ?? null;
            if ($img) {

                // Đường dẫn lưu DB vì thư mục upload cùng cấp với index.php
                // Khi lưu vào DB, chú ý là trước uploads có dấu /
                $pathSaveDB = '/uploads/' . $img['name'];

                // Đường dẫn upload có thêm __DIR__ . '/../../../'
                // vì File ProductController của mình đang cách thư mục uploads 3 cấp
                // Nên sẽ thấy có 3 lần ../
                // __DIR__ là 2 const mặc định của PHP để lấy ra đường dẫn thư mục hiện tại của ProductController 
                $pathUpload = __DIR__ . '/../../../uploads/' . $img['name'];

                if (move_uploaded_file($img['tmp_name'], $pathUpload)) { 
                    $data['img'] = $pathSaveDB;
                } 
            }

            (new Product())->insert($data);

            header('Location: /admin/products');
        }

        $categories = (new Category())->all();

        $this->renderAdmin("products/create", ["categories" => $categories]);
    }

    /* Cập nhật */
    public function update() {

        if (isset($_POST["btn-submit"])) { 
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'price_sale' => $_POST['price_sale'] ?: 0,
                'description' => $_POST['description'],
                'is_active' => $_POST['is_active'],
            ];

            $data['img'] = $_POST['img_current'];
            $img = $_FILES['img'] ?? null;
            $flag = false;
            if ($img) {

                $pathSaveDB = '/uploads/' . $img['name'];
                $pathUpload = __DIR__ . '/../../../uploads/' . $img['name'];

                if (move_uploaded_file($img['tmp_name'], $pathUpload)) { 
                    $data['img'] = $pathSaveDB;
                    $flag = true;
                } 
            }

            $conditions = [
                ['id', '=', $_GET['id']],
            ];

            (new Product())->update($data, $conditions);
            
            if ($flag) {

                // Xóa file dùng hàm unlink 
                // Path file cũng phải giống như $pathUpload
                $pathFile = __DIR__ .'/../../..'. $_POST['img_current'];
                unlink($pathFile);
            }
        }

        $categories = (new Category())->all();
        $product = (new Product())->findOne($_GET["id"]);

        $this->renderAdmin("products/update", ["product" => $product, 'categories' => $categories]);
    }

    /* Xóa */
    public function delete() {
        $conditions = [
            ['id', '=', $_GET['id']],
        ];

        (new Product())->delete($conditions);

        $pathFile = __DIR__ .'/../../..'. $_POST['img'];
        unlink($pathFile);

        header('Location: /admin/products');
    }
}