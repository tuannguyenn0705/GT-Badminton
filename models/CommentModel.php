<?php
class CommentModel extends BaseModel {
    // Lưu bình luận mới (Khớp đúng các cột: user_id, product_id, content, status)
    public function add($user_id, $product_id, $content) {
        $sql = "INSERT INTO comments (user_id, product_id, content, status) 
                VALUES (:user_id, :product_id, :content, 1)"; 
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'content' => $content
        ]);
    }

    // Lấy danh sách bình luận (Kèm tên người dùng để hiển thị)
    public function getByProductId($product_id) {
        $sql = "SELECT c.*, u.username 
                FROM comments c 
                JOIN users u ON c.user_id = u.id 
                WHERE c.product_id = :product_id AND c.status = 1 
                ORDER BY c.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll();
    }
}