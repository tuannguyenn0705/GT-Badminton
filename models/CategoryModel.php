<?php 

class CategoryModel extends BaseModel
{
    public $table = 'categories';

    public function getAll(){
        $sql = "SELECT * FROM categories ORDER BY id ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id){
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert($name, $description){
        $sql = "INSERT INTO categories (name, description) VALUES (:name, :description)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $name,
            'description' => $description
        ]);
    }

    public function update($id, $name, $description){
        $sql = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description
        ]);
    }

    public function delete($id){
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

}

?>