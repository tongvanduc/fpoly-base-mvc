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

    // Lấy ra 10 sản phẩm mới nhất, được order by theo ID sản phẩm
    public function getLatestLimit10() {
        $sql = "
            SELECT 
                p.name p_name,
                p.price p_price,
                p.price_sale p_price_sale,
                p.img p_img,
                c.id c_id,
                c.name c_name
            FROM products p 
            JOIN categories c
                ON p.category_id = c.id
            WHERE p.is_active = 1
            ORDER BY p.id DESC
            LIMIT 10
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    // Lấy ra tất cả sản phẩm theo ID danh mục, được order by theo ID sản phẩm
    public function getAllByCategoryID($categoryID) {
        $sql = "
            SELECT 
                p.name p_name,
                p.price p_price,
                p.price_sale p_price_sale,
                p.img p_img,
                c.id c_id,
                c.name c_name
            FROM products p 
            JOIN categories c
                ON p.category_id = c.id
            WHERE 
                p.is_active = 1
                AND 
                p.category_id = :categoryID
            ORDER BY p.id DESC
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':categoryID', $categoryID);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }
}