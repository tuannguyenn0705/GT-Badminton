<?php

class UserModel extends BaseModel
{
    // Hàm tìm user dựa vào email
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function insertUser($username, $email, $password){
        $sql = "INSERT INTO users (username, email, password, is_admin) VALUES (:username, :email, :password, 0)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
    }
}
?>