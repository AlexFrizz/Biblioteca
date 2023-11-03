<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Visualizzazione Prestiti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query6.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');
        $matricola = $_POST['matricola'];

        if($matricola==NULL)
        {
            $sql = "SELECT UTENTE.NUMERO_MATRICOLA, UTENTE.NOME, UTENTE.COGNOME, UTENTE.INDIRIZZO_ABITAZIONE, UTENTE.TELEFONO,
            LIBRO.TITOLO, PRENDE.DATA_USCITA, PRENDE.DATA_RESTITUZIONE
            FROM UTENTE
            LEFT JOIN PRENDE ON UTENTE.NUMERO_MATRICOLA = PRENDE.MATRICOLA
            LEFT JOIN LIBRO ON PRENDE.IDLIBRO = LIBRO.ID_LIBRO";

            $result = mysqli_query($link, $sql);

            if($result && mysqli_num_rows($result)>0)
            {
                echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>NUMERO_MATRICOLA</center></th>";
				echo "<th><center>NOME</center></th>";
                echo "<th><center>COGNOME</center></th>";
				echo "<th><center>INDIRIZZO</center></th>";
				echo "<th><center>TELEFONO</center></th>";
                echo "<th><center>TITOLO</center></th>";
                echo "<th><center>DATA_USCITA</center></th>";
                echo "<th><center>DATA_RESTITUZIONE</center></th>";
				echo "</tr>";

                while($row=mysqli_fetch_array($result))
                {
					echo "<tr>";
					echo "<td><center>".$row['NUMERO_MATRICOLA']."</center></td>";
                    echo "<td><center>".$row['NOME']."</center></td>";
					echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['INDIRIZZO_ABITAZIONE']==NULL)
						echo "<td><center>indirizzo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['INDIRIZZO_ABITAZIONE']."</center></td>";
					if($row['TELEFONO']==NULL)
						echo "<td><center>telefono non conosciuta</center></td>";
					else
						echo "<td><center>".$row['TELEFONO']."</center></td>";
					if($row['TITOLO']==NULL)
						echo "<td><center>titolo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['TITOLO']."</center></td>";				
                    if($row['DATA_USCITA']==0)
						echo "<td><center>data uscita non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_USCITA']."</center></td>";				
                    if($row['DATA_RESTITUZIONE']==NULL)
						echo "<td><center>data restutuzione non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_RESTITUZIONE']."</center></td>";				
					echo "</tr>";
				}
				echo "<table></center>";
			}
		}

        mysqli_close($link);
        ?>
</body>
</html>