<div class="container mt-3">
    <h2>Giỏ hàng</h2>

    <div class="row">
        <div class="col-md-8">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>ID SP</th>
                        <th>Price SP</th>
                        <th>Quantity SP</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($_SESSION['cart'] as $idSP => $value) : ?>
                        <tr>
                            <td><?= $idSP ?></td>
                            <td><?= $value['price'] ?></td>
                            <td>
                                <a href="/decrementQuantity?id=<?= $idSP ?>" class="btn btn-danger">-</a>
                                <button type="button" class="btn btn-info"><?= $value['quantity'] ?></button>
                                <a href="/incrementQuantity?id=<?= $idSP ?>" class="btn btn-success">+</a>
                            </td>
                            <td>
                                <a href="/removeFromCart?id=<?= $idSP ?>" class="text-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <div class="col-md-4">
            <ul>
                <li>Tổng tiền: 

                    <?php 
                        $sum = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $sum += $item['price'] * $item['quantity'];
                        }

                        echo number_format($sum) . "<sup>vnđ</sup>";
                    ?>
                </li>
            </ul>
            <form action="/createOrder" method="POST">
                <label for="name">Name</label>
                <input type="text" required name="name" class="form-control">

                <label for="email">Email</label>
                <input type="email" required name="email" class="form-control">

                <label for="phone">Phone</label>
                <input type="tel" required name="phone" class="form-control">

                <label for="address">Address</label>
                <input type="text" required name="address" class="form-control">

                <button type="submit" class="btn btn-primary mt-3">Đặt hàng</button>
            </form>
        </div>
    </div>
</div>