<?php
	$link = mysqli_connect("127.0.0.1", "root", "password", "BIBLIOTECA");
	if (!$link) {
    		echo "Si รจ verificato un errore: impossibile collegarsi al database" . PHP_EOL;
    		echo "Codice errore: " . mysqli_connect_errno() . PHP_EOL;
    		echo "Messaggio errore: " . mysqli_connect_error() . PHP_EOL;
    		exit(-1);
	}
?>