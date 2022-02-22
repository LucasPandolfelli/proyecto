<?php
session_start();
include('connect.php');

?>



<html>

<head>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" type="text/css">
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../public/css/styles.css">
	<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

</head>


<body>
	<?php if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] === true) {?>
		<div class="bg-dark">
			<div class="container py-4">
				<div class="row justify-content-end">
					<div class="dropdown w-auto">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?=$_SESSION['name'];?>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="users/edit.php">Editar datos</a>
							<a class="dropdown-item" href="posts/add.php">Añadir post</a>
						</div>
					</div>
					<a href="http://localhost/nuevo/auth/logout.php" class="text-white w-auto fw-bold">Salir</a>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="bg-dark">
			<div class="container py-4">
				<div class="row justify-content-end">
					<a href="http://localhost/nuevo/auth/login.php" class="text-white w-auto fw-bold">Login</a>
					<a href="http://localhost/nuevo/users/add.php" class="text-white w-auto fw-bold">Registro</a>
				</div>
			</div>
		</div>
	<?php } ?>



