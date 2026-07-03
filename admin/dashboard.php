<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location: login.php");

exit;

}

require_once "../includes/db.php";

$totalProducts=$pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

$totalCategories=$pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();

$totalOrders=$pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();

$totalCustomers=$pdo->query("SELECT COUNT(*) FROM customers")->fetchColumn();

include "includes/header.php";

include "includes/sidebar.php";

?><?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$totalCategories = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$totalOrders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$totalCustomers = $pdo->query("SELECT COUNT(*) FROM customers")->fetchColumn();

?>

<!DOCTYPE html>
<html lang="sq">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard | Purewellness.al</title>

<link rel="stylesheet" href="../assets/css/admin.css">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="sidebar">

<h2>Purewellness</h2>

<ul>

<li><a href="dashboard.php">Dashboard</a></li>

<li><a href="products.php">Produktet</a></li>

<li><a href="categories.php">Kategoritë</a></li>

<li><a href="orders.php">Porositë</a></li>

<li><a href="settings.php">Cilësimet</a></li>

<li><a href="logout.php">Dil</a></li>

</ul>

</div>

<div class="content">

<h1>Dashboard</h1>

<div class="cards">

<div class="card">

<h3>Produkte</h3>

<p><?php echo $totalProducts; ?></p>

</div>

<div class="card">

<h3>Kategori</h3>

<p><?php echo $totalCategories; ?></p>

</div>

<div class="card">

<h3>Porosi</h3>

<p><?php echo $totalOrders; ?></p>

</div>

<div class="card">

<h3>Klientë</h3>

<p><?php echo $totalCustomers; ?></p>

</div>

</div>

<h2>Mirë se erdhe,
<?php echo htmlspecialchars($_SESSION['admin']['full_name']); ?>

</h2>

<p>

Nga ky panel mund të menaxhosh të gjithë dyqanin.

</p>

</div>
<?php

include "includes/footer.php";

?>
