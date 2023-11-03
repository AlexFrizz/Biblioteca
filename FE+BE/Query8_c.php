<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ricerca Libro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query8_c.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');
        $cognome = $_POST['cognome'];

        if($cognome==NULL)
        {
			echo "errore nessun dato inserito";
		}
        else if($cognome!=NULL)
        {
			$sql = "SELECT A.ID_AUTORE, A.NOME, A.COGNOME, COUNT(L.ID_LIBRO) AS NUMERO_LIBRI
					FROM BIBLIOTECA.AUTORE A
					LEFT JOIN BIBLIOTECA.LIBRO_AUTORE LA ON A.ID_AUTORE = LA.IDAUTORE
					LEFT JOIN BIBLIOTECA.LIBRO L ON LA.IDLIBRO = L.ID_LIBRO
					WHERE A.COGNOME = '$cognome'
					GROUP BY A.ID_AUTORE, A.NOME, A.COGNOME
					ORDER BY A.COGNOME, A.NOME";
				
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0)
            {
				$row = $result->fetch_assoc();
				
                echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID AUTORE</center></th>";
				echo "<th><center>NOME</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>NUMERO LIBRI</center></th>";
				echo "</tr>";
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";					
					echo "<td><center>".$row['NOME']."</center></td>";										
					echo "<td><center>".$cognome."</center></td>";
					echo "<td><center>".$row['NUMERO_LIBRI']."</center></td>";					
					echo "</tr>";
				echo "<table></center>";
			}
			}
        mysqli_close($link);
        ?>
</body>
</html>