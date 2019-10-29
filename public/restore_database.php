<?php
	//Tragen Sie hier Ihre Datenbankinformationen ein und den Namen der Backup-Datei
	$mysqlHostName = 'localhost';
	$mysqlUserName = 'root';
	$mysqlPassword = 'rootcode';
	$mysqlDatabaseName = 'dbceneco';
	$mysqlImportFilename = substr($_REQUEST['data'],12,30);

	//Por favor, no haga ningún cambio en los siguientes puntos
	//Importación de la base de datos y salida del status
	$command='C:\xampp\mysql\bin\mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
	system($command,$worked);
	if($worked){
		echo "<div class='alert alert-danger' role='alert'>".'Ha ocurrido un error al restaurar los datos del archivo <b>' .$mysqlImportFilename .'</b> no se han importado correctamente a la base de datos <b>' .$mysqlDatabaseName .'</b>'."</div>";
	}else{
		echo "<div class='alert alert-success' role='alert'>".'Los datos del archivo <b>' .$mysqlImportFilename .'</b> se han importado correctamente a la base de datos <b>' .$mysqlDatabaseName .'</b>'."</div>";
	}
?>