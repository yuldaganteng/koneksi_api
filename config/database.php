<?php
$host = 'localhost';
$dbname = 'koneksi_databaseku';
$username = 'root';
$password = ''; // kosong jika pakai Laragon/XAMPP default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
