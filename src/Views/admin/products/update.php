<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Product</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Product</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Cập nhật </h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">

                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?= $product['name'] ?>">

                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <?php foreach ($categories as $category) : ?>
                                                <option 
                                                    <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?> 
                                                    value="<?= $category['id'] ?>">
                                                    
                                                    <?= $category['name'] ?>

                                                </option>
                                            <?php endforeach; ?>
                                        </select>

                                        <label for="img">Img</label>
                                        <input type="file" name="img" id="img" class="form-control">
                                        <input type="hidden" name="img_current" id="img_current" class="form-control" value="<?= $product['img'] ?>">
                                        <img src="<?= $product['img'] ?>" alt="" width="100px">

                                        <br>

                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price" class="form-control" value="<?= $product['price'] ?>">

                                        <label for="price_sale">Price sale</label>
                                        <input type="number" name="price_sale" id="price_sale" class="form-control" value="<?= $product['price_sale'] ?>">

                                        <label for="is_active">Active</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option <?= $product['is_active'] ? '' : 'selected' ?>  value="0">No</option>
                                            <option <?= $product['is_active'] ? 'selected' : '' ?>  value="1" selected>Yes</option>
                                        </select>

                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control"><?= $product['description'] ?></textarea>

                                        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Submit</button>
                                        <a href="/admin/products" class="btn btn-primary mt-3">Quay lại d/s</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>