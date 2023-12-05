<?php

namespace Ductong\BaseMvc\Controllers\Client;

use Ductong\BaseMvc\Controller;
use Ductong\BaseMvc\Models\Order;
use Ductong\BaseMvc\Models\OrderDetail;
use Ductong\BaseMvc\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        $this->render('cart');
    }

    /*
        Đây là hàm hiển thị danh sách user
    */
    public function addToCart()
    {
        if (!empty($_POST)) {
            $_SESSION['cart'][$_POST['id']] = [
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
            ];
        }

        header('Location: /cart');
    }

    public function removeFromCart()
    {
        $id = $_GET['id'] ?? '';

        if (!empty($id)) {
            unset($_SESSION['cart'][$id]);
        }

        header('Location: /cart');
    }

    public function incrementQuantity()
    {
        $id = $_GET['id'] ?? '';

        if (!empty($id) && isset($_SESSION['cart'][$id])) {
            ++$_SESSION['cart'][$id]['quantity'];
        }

        header('Location: /cart');
    }

    public function decrementQuantity()
    {
        $id = $_GET['id'] ?? '';

        if (!empty($id) && isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantity'] > 1) {
                --$_SESSION['cart'][$id]['quantity'];
            }
        }

        header('Location: /cart');
    }

    public function createOrder()
    {
        if (!empty($_POST)) {
            // Tạo mới Order
            $sum = 0;
            foreach ($_SESSION['cart'] as $item) {
                $sum += $item['price'] * $item['quantity'];
            }

            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'total_price' => $sum,
                'status' => STATUS_PENDING,
                'created_at' => date('Y-m-d', time()),
            ];

            $orderID = (new Order)->insert($data);

            // Tạo Order detail
            foreach ($_SESSION['cart'] as $productID => $item) {
                $data = [
                    'order_id' => $orderID,	
                    'product_id' => $productID,	
                    'quantity' => $item['quantity'],	
                    'price' => $item['price'],
                ];

                (new OrderDetail)->insert($data);
            }

            $_SESSION['cart'] = [];
        }

        header('Location: /');
    }
}
