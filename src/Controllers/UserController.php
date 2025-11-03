<?php
require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function index() {
        echo json_encode($this->user->all());
    }

    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->user->create($data['name'], $data['email']));
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->user->update($id, $data['name'], $data['email']));
    }

    public function delete($id) {
        echo json_encode($this->user->delete($id));
    }
}
