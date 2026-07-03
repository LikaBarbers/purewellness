<?php

require_once "includes/db.php";

$products = $pdo->query("

SELECT *

FROM products

ORDER BY id DESC

LIMIT 8

")->fetchAll();

?>

<!DOCTYPE html>

<html lang="sq">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Purewellness.al</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<h1>Mirësevini në Purewellness.al</h1>

<p>Website është në ndërtim.</p>

</body>

</html>
