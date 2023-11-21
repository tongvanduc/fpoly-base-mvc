<?php

namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class Product extends Model {
    protected $table = 'products';
    protected $columns = [
        'category_id',
        'name',
        'price',
        'price_sale',
        'img',
        'description',
        'is_active',
    ];
}