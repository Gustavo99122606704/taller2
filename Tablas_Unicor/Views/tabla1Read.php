<?php  

	include '../Conexion/conexion.php';
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM profesor WHERE id_profesor = ?;");
	$sentencia->execute([$id]);
	$persona = $sentencia->fetch(PDO::FETCH_OBJ);
			
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver profesor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="formulario">
<h3>Ver profesor:</h3>
		<form method="POST" action="router.php?controller=Profesor&action=UpdateProfesor">
			<table class="table2">
			    <tr>
					<td>Nombre:</td>
					<td><input type="text" name="txtNombre2" value="<?php echo $persona->nombre; ?>"></td>
				</tr>
			    <tr>
					<td>Apellidos: </td>
					<td><input type="text" name="txtApellidos2" value="<?php echo $persona->apellidos; ?>"></td>
				</tr>
				<tr>
					<td>Número de identificacion: </td>
					<td><input type="number" name="txtIdentificacion2" value="<?php echo $persona->n_identificacion; ?>"></td>
				</tr>
				<tr>
					<td>Telefono: </td>
					<td><input type="number" name="txtTelefono2" value="<?php echo $persona->telefono; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_profesor; ?>">
				
				</tr>
			</table>
			<div class="botones">					
					<div><input type="submit" class="form__button" value="Editar profesor"></div>			
           </div>
		</form>
</div>
		
</body>
</html>