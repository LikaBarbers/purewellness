<?php

session_start();

require_once "../includes/db.php";

if(isset($_SESSION['admin'])){

header("Location: dashboard.php");

exit;

}

$error="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$email=$_POST['email'];

$password=$_POST['password'];

$stmt=$pdo->prepare("SELECT * FROM admins WHERE email=?");

$stmt->execute([$email]);

$admin=$stmt->fetch();

if($admin){

if(password_verify($password,$admin['password'])){

$_SESSION['admin']=$admin;

header("Location: dashboard.php");

exit;

}else{

$error="Fjalëkalimi nuk është i saktë.";

}

}else{

$error="Administratori nuk ekziston.";

}

}

?>

<!DOCTYPE html>

<html lang="sq">

<head>

<meta charset="UTF-8">

<title>Login Admin</title>

</head>

<body>

<h2>Admin Login</h2>

<?php echo $error; ?>

<form method="POST">

<input type="email" name="email" placeholder="Email">

<br><br>

<input type="password" name="password" placeholder="Password">

<br><br>

<button>Hyr</button>

</form>

</body>

</html>
