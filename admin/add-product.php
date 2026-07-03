<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

$categories = $pdo->query("SELECT * FROM categories ORDER BY name")->fetchAll();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $category = (int)$_POST["category"];
    $description = trim($_POST["description"]);
    $price = (float)$_POST["price"];
    $sale_price = (float)$_POST["sale_price"];
    $stock = (int)$_POST["stock"];
    $featured = isset($_POST["featured"]) ? 1 : 0;

    $image = "";

    if (!empty($_FILES["image"]["name"])) {

        $image = time() . "_" . basename($_FILES["image"]["name"]);

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../assets/uploads/" . $image
        );
    }

    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);

    $stmt = $pdo->prepare("
    INSERT INTO products
    (
        category_id,
        name,
        slug,
        description,
        price,
        sale_price,
        stock,
        image,
        featured
    )
    VALUES
    (
        ?,?,?,?,?,?,?,?,?
    )
    ");

    $stmt->execute([
        $category,
        $name,
        $slug,
        $description,
        $price,
        $sale_price,
        $stock,
        $image,
        $featured
    ]);

    $message = "Produkti u shtua me sukses.";

}

include "includes/header.php";
include "includes/sidebar.php";
?>

<h1>Shto Produkt</h1>

<?php if($message): ?>

<div class="success">

<?= $message; ?>

</div>

<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="form">

<label>Emri i produktit</label>

<input
type="text"
name="name"
required>

<label>Kategoria</label>

<select name="category">

<?php foreach($categories as $cat): ?>

<option value="<?= $cat['id']; ?>">

<?= htmlspecialchars($cat['name']); ?>

</option>

<?php endforeach; ?>

</select>

<label>Përshkrimi</label>

<textarea
name="description"
rows="6"></textarea>

<label>Çmimi</label>

<input
type="number"
step="0.01"
name="price"
required>

<label>Çmimi në ofertë</label>

<input
type="number"
step="0.01"
name="sale_price">

<label>Stoku</label>

<input
type="number"
name="stock"
value="1">

<label>Foto</label>

<input
type="file"
name="image">

<label>

<input
type="checkbox"
name="featured">

Produkt Featured

</label>

<br><br>

<button class="save-btn">

Ruaj Produktin

</button>

</form>

<?php include "includes/footer.php"; ?>
