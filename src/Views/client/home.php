<div class="container mt-3">
    <h2>Top 10 sản phẩm</h2>
    <p>Mua ngay nhé</p>

    <div class="row">
        <?php foreach($getLatestLimit10 as $item): ?>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img class="card-img-top" src="<?= $item['p_img'] ?>" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title"><?= $item['p_name'] ?></h4>
                        <p class="card-text">
                            <ul>
                                <li>Giá: <?= number_format($item['p_price']) ?> <sup>vnđ</sup></li>
                                <li>Danh mục: <?= $item['c_name'] ?></li>
                            </ul>
                        </p>
                        <form action="/addToCart" method="POST">
                            <input type="hidden" name="price" value="<?= $item['p_price'] ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="<?= $item['p_id'] ?>">
                            <button type="submit" class="btn btn-primary">Thêm giỏ hàng</button>
                        </form>
                        
                        <a href="#" class="btn btn-info mt-3">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>