<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport">
	<title>Script php backup and restore Mysqli</title>
</head>

<body>
	<div class="card col-md-12">
		<div class="card-header bg-teal color-palette">
			<h1 class="m-0">Backup y Restore</h1>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
					<br>
					<a href="/vista/BRMI-master/php/Backup.php" class="btn btn-info btn-lg">Realizar copia de seguridad</a> <br><br><br>
					</div>
					<div class="col-sm-6">
						<form action="/vista/BRMI-master/php/Restore.php" method="POST">
							<label>Selecciona un punto de restauración</label><br>
							<select name="restorePoint">
								<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
								<?php
								include_once './Connet.php';
								$ruta = BACKUP_PATH;
								if (is_dir(BACKUP_PATH)) {
									if ($aux = opendir(BACKUP_PATH)) {
										while (($archivo = readdir($aux)) !== false) {
											if ($archivo != "." && $archivo != "..") {
												$nombrearchivo = str_replace(".sql", "", $archivo);
												$nombrearchivo = str_replace("-", ":", $nombrearchivo);
												$ruta_completa = $archivo;
												if (is_dir($ruta_completa)) {
												} else {
													echo '<option value="' . $ruta_completa . '">' . $nombrearchivo . '</option>';
												}
											}
										}
										closedir($aux);
									}
								} else {
									echo $ruta . " No es ruta válida";
								}
								?>
							</select>
							<button type="submit" class="btn btn-info">Restaurar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>