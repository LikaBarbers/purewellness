<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$products = $pdo->query("
SELECT
products.*,
categories.name AS category_name
FROM products
LEFT JOIN categories
ON products.category_id = categories.id
ORDER BY products.id DESC
")->fetchAll();

include "includes/header.php";
include "includes/sidebar.php";
?>

<h1>Produktet</h1>

<a href="add-product.php" class="btn-add">
➕ Shto Produkt
</a>

<table class="table">

<thead>

<tr>

<th>ID</th>

<th>Foto</th>

<th>Produkti</th>

<th>Kategoria</th>

<th>Çmimi</th>

<th>Stoku</th>

<th>Veprime</th>

</tr>

</thead>

<tbody>

<?php foreach($products as $product): ?>

<tr>

<td><?= $product['id']; ?></td>

<td>

<?php if($product['image']) : ?>

<img src="../assets/uploads/<?= htmlspecialchars($product['image']); ?>" width="70">

<?php endif; ?>

</td>

<td><?= htmlspecialchars($product['name']); ?></td>

<td><?= htmlspecialchars($product['category_name']); ?></td>

<td><?= number_format($product['price'],2); ?> Lek</td>

<td><?= $product['stock']; ?></td>

<td>

<a class="edit-btn"
href="edit-product.php?id=<?= $product['id']; ?>">
Edit
</a>

<a class="delete-btn"
href="delete-product.php?id=<?= $product['id']; ?>"
onclick="return confirm('Je i sigurt?');">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<?php include "includes/footer.php"; ?>
