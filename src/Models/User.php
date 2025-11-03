<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        return ['id' => $this->pdo->lastInsertId(), 'name' => $name, 'email' => $email];
    }

    public function update($id, $name, $email) {
        $stmt = $this->pdo->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->execute([$name, $email, $id]);
        return ['id' => $id, 'name' => $name, 'email' => $email];
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$id]);
        return ['message' => 'User deleted'];
    }
}
