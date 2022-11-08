<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ingresar fechas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="formulario">
	<h3>Ingresar fechas:</h3>
		<form method="POST" action="router.php?controller=Informe&action=ReadInforme">
			<table class="table">
			    <tr>
				    <td>Fecha Inicio</td>
					<td><input type="date" name="txtFechainicio" required></td>
				</tr>
				<tr>
					<td>Fecha Finalizacion </td>
					<td><input type="date" name="txtFechafinalizacion" required></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				
			</table>
			<div class="botones">
					
					<div><input type="submit" class="form__button" value="Generar reporte"></div>
					<div><input type="reset" class="form__button"  name="" value="Limpiar"></div>
					<div><a href="cursos.php" class="form__buttonn">Ir registrar cursos</a></div>
					
					
           </div>
		</form>
        </div>
</body>
</html>


