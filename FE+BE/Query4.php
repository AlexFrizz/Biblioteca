<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Visualizzazione Utenti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query4.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');
	
		$sql = "SELECT UTENTE.*
			FROM UTENTE";

		$result = mysqli_query($link, $sql);
		
		if($result && mysqli_num_rows($result)>0)
		{
			echo "<center><table border='1'>";
			echo "<tr>";
			echo "<th><center>MATRICOLA</center></th>";
			echo "<th><center>TELEFONO</center></th>";
			echo "<th><center>INDIRIZZO</center></th>";
			echo "<th><center>NOME</center></th>";
			echo "<th><center>COGNOME</center></th>";
			echo "</tr>";

			while($row=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td><center>".$row['NUMERO_MATRICOLA']."</center></td>";
				if($row['TELEFONO']==NULL)
					echo "<td><center>telefono non conosciuto</center></td>";
				else
					echo "<td><center>".$row['TELEFONO']."</center></td>";
				if($row['INDIRIZZO_ABITAZIONE']==NULL)
					echo "<td><center>INDIRIZZO non conosciuta</center></td>";
				else
					echo "<td><center>".$row['INDIRIZZO_ABITAZIONE']."</center></td>";
				if($row['NOME']==NULL)
					echo "<td><center>nome non conosciuto</center></td>";
				else
					echo "<td><center>".$row['NOME']."</center></td>";	
					if($row['COGNOME']==NULL)
					echo "<td><center>cognome non conosciuto</center></td>";
				else
					echo "<td><center>".$row['COGNOME']."</center></td>";					
				echo "</tr>";
			}
			echo "<table></center>";
		}
        mysqli_close($link);
        ?>
</body>
</html>