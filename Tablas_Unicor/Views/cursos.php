<?php 
include '../Conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de cursos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="formulario">
<h3>Ingresar cursos:</h3>
		<form method="POST" action="router.php?controller=Curso&action=RegistrarCurso">
			<table class="table1">
			    <tr>
				    <td>Nombre curso: </td>
					<td><input type="text" name="txtNombrecurso" required></td>
				</tr>
				<tr>
					<td>Cantidad estudiante: </td>
					<td><input type="number" name="txtCantidad" required></td>
				</tr>
				<tr>
					<td>Correo curso: </td>
					<td><input type="email" name="txtCorreo"></td>
				</tr>
				<tr>
					<td>Fecha y hora: </td>
					<td><input type="datetime-local" name="txtFechaH" required></td>
				</tr>
                <tr>
					<td>Fecha: </td>
					<td><input type="date" name="txtFecha" required></td>
				</tr>
                <tr>
					<td>Valor curso: </td>
					<td><input type="text" name="txtValor" ></td>
				</tr>
                <tr>
					<td>Profesor: </td>
					<td>
					<select name="txtProfesor" id="" required>
					
					<?php 
					
					$sentencia1 = $bd->query("SELECT * FROM profesor;");
					$profesorr = $sentencia1->fetchAll(PDO::FETCH_OBJ);
				    foreach ($profesorr as $salida) {
					?>
					<option value="<?php echo $salida->id_profesor?>"><?php echo $salida->nombre ?> </option>
					<?php
				}
			     ?> 
					</select>
					</td>
					
				</tr>

				<input type="hidden" name="oculto" value="1">
				
			</table>
			<div class="botones">
					
					<div><input type="submit" class="form__button" value="Ingresar cursos"></div>
					<div><input type="reset" class="form__button"  name="" value="Limpiar"></div>
					<div><a href="../index.php" class="form__buttonn">Ir registrar profesor</a></div>
					<div><a href="informe.php" class="form__buttonn">ver informe</a></div>
					
           </div>
		</form>
		<!-- fin insert-->
        <hr>
		<h3>Lista de cursos</h3>
		<table>
			<tr>
				<td>Código</td>
				<td>Nombre curso</td>
				<td>Cantidad estudiante</td>
				<td>Correo curso</td>
				<td>Fecha y hora</td>
                <td>Fecha</td>
                <td>Valor curso</td>
                <td>Profesor</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 



$sentencia = $bd->query("SELECT cur.id_curso, cur.cantidad_estu, cur.fecha_hora,cur.correo_curso,cur.valor_curso,cur.fecha,cur.nombre_curso,prof.nombre FROM cursos cur INNER JOIN profesor prof ON cur.id_profesor = prof.id_profesor;");

			while ($filas=$sentencia->fetch(PDO::FETCH_ASSOC)) {
				
				
				echo'
				<tr>
						<td>'.$filas['id_curso'].'</td>
						<td>'.$filas['nombre_curso'].'</td>
						<td>'.$filas['cantidad_estu'].'</td>
						<td>'.$filas['correo_curso'].'</td>
						<td>'.$filas['fecha_hora'].'</td>
						<td>'.$filas['fecha'].'</td>
						<td>'.$filas['valor_curso'].'</td>
						<td>'.$filas['nombre'].'</td>
						<td><a href="router.php?controller=Curso&action=ReadCurso&id='.$filas['id_curso'].'">Ver datos</a></td>
						<td><a href="router.php?controller=Curso&action=EliminarCurso&id='.$filas['id_curso'].'">Eliminar</a></td>
					</tr>
					';

			
			}
			
								
			?>
			
		</table>

	</div>
		
		
		

</body>

</html>