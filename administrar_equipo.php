<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index1.php");
}
?>
<?php
include('conexion.php');
$id = $_GET['id'];
?>

<!--
<?php
/*

	include('conexion.php');
	$id = $_GET['id'];

	$consulta = "SELECT * FROM fotos WHERE FKGALERIA='$id' ORDER BY POSICION ASC";
	$filas = mysqli_query($conexion, $consulta);
*/
	
?>
-->

<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMINISTRAR EQUIPO</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"

</head>
<body>
<header class="header">
<div class="row">
	<center><h1 class="span">PLANTILLA DE EQUIPO</h1></center>	
</div>
</header>

  <!-- Navbar
    ================================================== -->
<?php

include("include/menu.php");

?>
	<center><h2>JUGADORES</h2></center>
	
		<center>
		<table border="2">
			<thead>
				
				<tr>
					
					<th>Nombre</th>
					<th>Apodo</th>
					<th>Rut</th>
					<th>Posicion</th>
					<th>Imagen</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				
				include("conexion.php");
				$id = $_GET['id'];

				$query = "SELECT * FROM foto WHERE FKGALERIA='$id' ";
				$resultado = $conexion->query($query);
				

				while($row = $resultado->fetch_assoc()){


				?>
					<tr>
						
						<td><?php echo $row['NOMBRE'];?></td>
						<td><?php echo $row['APODO'];?></td>
						<td><?php echo $row['RUT'];?></td>
						<td><?php echo $row['POSICIONJUGADOR'];?></td>
						<td><img height="100" width="100" src="data:image/jpg;base64,<?php echo base64_encode($row['IMAGEN']); ?>" ></td>
						<!--<th><a href="borrar_jugador.php">Eliminar</a></th>-->

					</tr>
				<?php
					}
					
				?>
			</tbody>
		</table>
	</center>

<!--
	<?php
	/*
	
	while ( $columna = mysqli_fetch_assoc($filas)){
	echo '<div>';
	echo "<p>$columna[NOMBRE]</p>";
	echo "<img src='$columna[IMAGEN]>";
	echo '</div>';
	}

	*/
	?>
-->
	<hr>
	<center>
		<h2>Nuevo Jugador</h2>
	</center>
	
	<center><br><br>
		<form action="proceso_guardar.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="idgaleria" value="<?php echo $id;?>">
			<input type="text" name="NOMBRE" value="" REQUIRED placeholder="Nombre y Apellido"><br><br>
			<input type="text" name="APODO" value="" placeholder="Apodo"><br><br>
			<input type="text" name="RUT" value="" REQUIRED placeholder="RUT Ej: 12345678-9"><br><br>
			<input type="text" name="POSICIONJUGADOR" value="" placeholder="Posicion"><br><br>
			<input type="file" name="IMAGEN"><br>
			<input type="submit" value="aceptar"><br>
		
		</form>
	</center>


</body>
</html>