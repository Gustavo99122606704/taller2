<?php  

	include 'Conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM profesor;");
	$profesor = $sentencia->fetchAll(PDO::FETCH_OBJ);
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de profesor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<div class="formulario">
	<h3>Ingresar profesor:</h3>
		<form method="POST" action="Views/router.php?controller=Profesor&action=RegistrarProfesor">
			<table class="table">
			    <tr>
				    <td>Nombres: </td>
					<td><input type="text" name="txtNombre" required></td>
				</tr>
				<tr>
					<td>Apellidos: </td>
					<td><input type="text" name="txtApellidos" required></td>
				</tr>
				<tr>
					<td>Número identificacion: </td>
					<td><input type="number" name="txtIdentificacion" required></td>
				</tr>
				<tr>
					<td>Telefono: </td>
					<td><input type="number" name="txtTelefono"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				
			</table>
			<div class="botones">
					
					<div><input type="submit" class="form__button" value="Ingresar profesor"></div>
					<div><input type="reset" class="form__button"  name="" value="Limpiar"></div>
					<div><a href="Views/cursos.php" class="form__buttonn">Ir registrar cursos</a></div>
					
					
           </div>
		</form>
		<!-- fin insert-->
        <hr>
		<h3>Lista de profesor</h3>
		<table>
			<tr>
				<td>Código</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Número identificacion</td>
				<td>Telefono</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 
				foreach ($profesor as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_profesor; ?></td>
						<td><?php echo $dato->nombre; ?></td>
						<td><?php echo $dato->apellidos ?></td>
						<td><?php echo $dato->n_identificacion; ?></td>
						<td><?php echo $dato->telefono; ?></td>
						<td><a href="Views/router.php?controller=Profesor&action=ReadProfesor&id=<?php echo $dato->id_profesor; ?>">Ver dato</a></td>
						<td><a href="Views/router.php?controller=Profesor&action=EliminarProfesor&id=<?php echo $dato->id_profesor; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

	</div>	
		
		
	
</body>
</html>