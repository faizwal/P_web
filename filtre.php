<?php
require_once 'database.php';
session_start();

$connexion = new connexion();
$pdo = $connexion->CNXbase();

// Récupération des filtres
$category = $_GET['category'] ?? 'all';
$sort = $_GET['sort'] ?? 'default';

// Construction de la requête SQL
$sql = "SELECT * FROM products";
$params = [];

if ($category !== 'all') {
    $sql .= " WHERE category = :category";
    $params[':category'] = $category;
}

if ($sort === 'price-low') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort === 'price-high') {
    $sql .= " ORDER BY price DESC";
}

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total_products = count($products);
} catch (PDOException $e) {
    $products = [];
    $total_products = 0;
    $error = $e->getMessage();
}
