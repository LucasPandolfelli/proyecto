<?php

include('../header.php');

if(!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true){
	header("location: http://localhost/nuevo/auth/login.php");
	exit;
}

$sql = "SELECT id, name, lastname, email, password, street, streetnumber from USERS";
$result = $mysqli->query($sql);

?>



<div class="container py-5">
	<h3 class="text-dark mb-5">Lista de usuarios</h3>
	<?php
	if ($result->num_rows > 0) {
		?>
		<div class="table-responsive">
			<table class="table">
				<thead class="table-dark">
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Dirección</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = $result->fetch_assoc()) { ?>
						<tr>
							<td><?=$row['id'];?></td>
							<td><?=$row['name'];?> <?=$row['lastname'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['street'];?> <?=$row['streetnumber'];?></td>
							<td>
								<div class="d-flex justify-content-around">
									<a href="edit.php?id=<?=$row['id'];?>"><i class="far fa-edit text-dark"></i></a>
									<a onclick="return confirm('Esta seguro?')" href="delete.php?id=<?=$row['id'];?>"><i class="far fa-trash-alt text-dark"></i></a>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	<?php } else { ?>
		<h4 class="text-dark">No hay registros</h4>
	<?php } ?>


</div>







<?php

include('../footer.php');

?>