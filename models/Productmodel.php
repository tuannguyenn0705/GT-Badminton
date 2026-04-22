<?php

class ProductModel extends BaseModel{
    public function getTop4Lastest(){
        $sql = 'SELECT pro.*, pro_im.image_url
                FROM `products` as pro LEFT JOIN product_images as pro_im
                ON pro.id = pro_im.product_id
                AND pro_im.is_main = 1 ORDER BY  pro.id DESC LIMIT 4';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllProducts(){
        $sql = "SELECT p.*, c.name as category_name, pi.image_url 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id
                LEFT JOIN product_images pi ON p.id = pi.product_id AND pi.is_main = 1
                ORDER BY p.id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function insertProduct($category_id, $name, $price, $quantity, $description){
        $sql = "INSERT INTO products (category_id, name, price, quantity, description) 
                VALUES (:category_id, :name, :price, :quantity, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'category_id' => $category_id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description
        ]);
        return $this->pdo->lastInsertId();
    }

    public function insertProductImage($product_id, $image_url){
        $sql = "INSERT INTO product_images (product_id, image_url, is_main) VALUES (:product_id, :image_url, 1)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'product_id' => $product_id,
            'image_url' => $image_url
        ]);
    }

    public function getById($id) {
        $sql = "SELECT p.*, pi.image_url 
                FROM products p 
                LEFT JOIN product_images pi ON p.id = pi.product_id AND pi.is_main = 1
                WHERE p.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateProduct($id, $category_id, $name, $price, $quantity, $description) {
        $sql = "UPDATE products 
                SET category_id = :category_id, name = :name, price = :price, quantity = :quantity, description = :description 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'category_id' => $category_id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description
        ]);
    }

    public function updateProductImage($product_id, $image_url) {
        $sqlDelete = "DELETE FROM product_images WHERE product_id = :product_id";
        $stmtDel = $this->pdo->prepare($sqlDelete);
        $stmtDel->execute(['product_id' => $product_id]);
        
        return $this->insertProductImage($product_id, $image_url);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // Lấy thông tin 1 danh mục
    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Lấy tất cả sản phẩm thuộc 1 danh mục
    public function getProductsByCategory($category_id) {
        $sql = "SELECT p.*, pi.image_url 
                FROM products p 
                LEFT JOIN product_images pi ON p.id = pi.product_id AND pi.is_main = 1
                WHERE p.category_id = :category_id
                ORDER BY p.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
        return $stmt->fetchAll();
    }

}

?>