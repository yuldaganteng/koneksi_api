<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Controllers/UserController.php';

$controller = new UserController($pdo);
$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

if ($request === '/' || $request === '/index.php') {
    echo json_encode(['message' => 'Server API berjalan!']);
    exit;
}

if (strpos($request, '/users') === 0) {
    if ($method === 'GET') {
        $controller->index();
    } elseif ($method === 'POST') {
        $controller->store();
    } elseif ($method === 'PUT') {
        $id = basename($request);
        $controller->update($id);
    } elseif ($method === 'DELETE') {
        $id = basename($request);
        $controller->delete($id);
    } else {
        echo json_encode(['message' => 'Metode tidak dikenali']);
    }
}
