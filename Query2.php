<html lang="it">
<head>
	<meta charset="utf-8">
	<title>Visualizzazione opere</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
	<style>
		body{
			max-width: 1200px;
		}
	</style>
</head>
<body>
	<label>Per effettuare una nuova ricerca premi <a href="Query2.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>
	<?php
		include_once('connessione.php');
		
		$codice = $_POST['codice'];
		
		if($codice==NULL)
			echo "<center><h3 style='color: red';>Non è stato inserito il codice di nessun autore</h3></center>";
		else{

			$sql = "SELECT AUTORE.NOME, AUTORE.COGNOME, LIBRO.ANNO_PUBBLICAZIONE, LIBRO.TITOLO
	 		FROM AUTORE
	 		JOIN LIBRO_AUTORE ON AUTORE.ID_AUTORE = LIBRO_AUTORE.IDAUTORE
	 		JOIN LIBRO ON LIBRO_AUTORE.IDLIBRO = LIBRO.ID_LIBRO
	 		WHERE AUTORE.ID_AUTORE = '$codice'
	 		ORDER BY LIBRO.ANNO_PUBBLICAZIONE, LIBRO.TITOLO";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><h4>Libri autori con codice ".$codice."</h4></center>";
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>NOME</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>TITOLO</center></th>";
				echo "<th><center>ANNO_PUBBLICAZIONE</center></th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['NOME']."</center></td>";
					echo "<td><center>".$row['COGNOME']."</center></td>";
					echo "<td><center>".$row['TITOLO']."</center></td>";
					echo "<td><center>".$row['ANNO_PUBBLICAZIONE']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red';>L'autore associato al codice ".$codice." non esiste oppure non ha 					      realizzato opere</h4></center>";
		}
		
		mysqli_close($link);
	?>
</body>
</html>