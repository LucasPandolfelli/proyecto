<?php

include('../header.php');

if ($_POST) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if ($email != '' && $password != ''){

		$sql = "SELECT id, name, lastname, email, password, street, streetnumber FROM users WHERE email='$email' AND password='$password'";

		$result = $mysqli->query($sql);

		if ($result->num_rows > 0){
			$user = $result->fetch_assoc();

			session_start();

			$_SESSION["isLoggedIn"] = true;
			$_SESSION["id"] = $user['id'];
			$_SESSION["name"] = $user['name'];  
			$_SESSION["lastname"] = $user['lastname'];  
			$_SESSION["email"] = $user['email'];    

			header("location: http://localhost/nuevo/index.php");

		} else {
			$error = "Usuario o contraseña incorrecta.";
		}
	}

	else {
		$error = "Debe completar todos los campos";
	}

}

?>




<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card p-4">
				<form method="post" class="mb-0">
					<div class="row mb-2">
						<div class="col-12">
							<label for="email" class="mb-1">Email</label>
							<input class="form-control form-control-sm" type="email" aria-label="email" name="email" required>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">
							<label for="password" class="mb-1">Contraseña</label>
							<input class="form-control form-control-sm" type="password" aria-label="password" name="password" required>
						</div>
					</div>
					<div class="row justify-content-center">
						<button type="submit" class="w-auto py-2 px-4 fw-bold bg-dark text-white">Ingresar</button>
					</div>
					<div class="row justify-content-center mt-3">
						<?php if(isset($error)) { ?>
							<p class="w-auto text-danger"><?= $error; ?></p>
						<?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<?php

include('../footer.php');

?>