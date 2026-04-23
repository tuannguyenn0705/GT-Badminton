<?php
class OrderModel extends BaseModel {
    
    // Lưu thông tin chung của đơn hàng (Khớp với các cột trong DB của bạn)
    public function createOrder($user_id, $customer_name, $customer_email, $customer_phone, $customer_address, $payment_method, $total_amount) {
        $sql = "INSERT INTO orders (user_id, customer_name, customer_email, customer_phone, customer_address, payment_method, total_amount, status) 
                VALUES (:user_id, :customer_name, :customer_email, :customer_phone, :customer_address, :payment_method, :total_amount, 0)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
            'customer_address' => $customer_address,
            'payment_method' => $payment_method,
            'total_amount' => $total_amount
        ]);
        return $this->pdo->lastInsertId();
    }

    // Lưu chi tiết từng sản phẩm trong đơn
    public function createOrderDetail($order_id, $product_id, $price, $quantity) {
        $sql = "INSERT INTO order_details (order_id, product_id, price, quantity) 
                VALUES (:order_id, :product_id, :price, :quantity)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'price' => $price,
            'quantity' => $quantity
        ]);
    }

    // Lấy danh sách đơn hàng của 1 user
    public function getOrdersByUserId($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll();
    }
}
?>