<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ricerca Libro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query8_b.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');
        $nome_s = $_POST['nome_s'];

        if($nome_s==NULL)
        {
            echo "errore nessun dato inserito";
		}

        else if($nome_s!=NULL)
        {
		
			$sql= " SELECT S.NOME AS NOME, COUNT(*) AS NUMERO_PRESTITI
					FROM SUCCURSALE S
					JOIN LIBRO L ON S.ID_SUCCURSALE = L.IDSUCCURSALE
					JOIN PRENDE P ON L.ID_LIBRO = P.IDLIBRO
					WHERE S.NOME = '$nome_s'";

				
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0)
            {
                echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>NOME</center></th>";
				echo "<th><center>NUMERO PRESTITI</center></th>";
				echo "</tr>";

                while($row=mysqli_fetch_array($result))
                {
					echo "<tr>";
					echo "<td><center>".$nome_s."</center></td>";
					if($row['NUMERO_PRESTITI']==NULL)
						echo "<td><center>numero non conosciuto</center></td>";
					else
						echo "<td><center>".$row['NUMERO_PRESTITI']."</center></td>";				
					echo "</tr>";
				}
				echo "<table></center>";
			}
		}
        mysqli_close($link);
        ?>
</body>
</html>