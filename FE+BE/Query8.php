<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ricerca Libro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query8.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');
        $anno = $_POST['anno'];

        if($anno==NULL)
        {
            echo "errore nessuna data inserita";
		}

        else if($anno!=NULL)
        {
			$sql = "SELECT COUNT(*) as numero_libri
					FROM LIBRO
					WHERE ANNO_PUBBLICAZIONE=$anno";
				
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0)
            {
				$row = $result->fetch_assoc();
				
                echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ANNO_PUBBLICAZIONE</center></th>";
				echo "<th><center>NUMERO</center></th>";
				echo "</tr>";
					echo "<tr>";
					echo "<td><center>".$anno."</center></td>";
					echo "<td><center>".$row['numero_libri']."</center></td>";					
					echo "</tr>";
				echo "<table></center>";
			}
			}
        mysqli_close($link);
        ?>
</body>
</html>