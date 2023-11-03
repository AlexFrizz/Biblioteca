<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ricerca Libro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query1.html">qui</a></label>
    <br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>
    
    <?php
        include_once('connessione.php');
        $titolo = $_POST['titolo'];

        if($titolo==NULL)
        {
            $sql = "SELECT LIBRO.*
                    FROM LIBRO";
            
            $result = mysqli_query($link, $sql);

            if($result && mysqli_num_rows($result)>0)
            {
                echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>TITOLO</center></th>";
				echo "<th><center>ISBN</center></th>";
				echo "<th><center>LINGUA</center></th>";
				echo "<th><center>ANNO DI PUBBLICAZIONE</center></th>";
				echo "<th><center>ID SUCCURSALE</center></th>";
				echo "</tr>";

                while($row=mysqli_fetch_array($result))
                {
					echo "<tr>";
					echo "<td><center>".$row['ID_LIBRO']."</center></td>";
					echo "<td><center>".$row['TITOLO']."</center></td>";
					if($row['ISBN']==NULL)
						echo "<td><center>ISBN non conosciuto</center></td>";
					else
						echo "<td><center>".$row['ISBN']."</center></td>";
					if($row['LINGUA']==NULL)
						echo "<td><center>LINGUA non conosciuta</center></td>";
					else
						echo "<td><center>".$row['LINGUA']."</center></td>";
					if($row['ANNO_PUBBLICAZIONE']==0)
						echo "<td><center>anno non conosciuto</center></td>";
					else
						echo "<td><center>".$row['ANNO_PUBBLICAZIONE']."</center></td>";
					if($row['IDSUCCURSALE']==0)
						echo "<td><center>id non conosciuto</center></td>";
					else
						echo "<td><center>".$row['IDSUCCURSALE']."</center></td>";					
					echo "</tr>";
				}
				echo "<table></center>";
			}
		}

        else if($titolo!=NULL)
        {
			$sql = "SELECT LIBRO.*
				FROM LIBRO
				WHERE LIBRO.titolo LIKE '%$titolo%'";
				
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0)
            {
                echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>TITOLO</center></th>";
				echo "<th><center>ISBN</center></th>";
				echo "<th><center>LINGUA</center></th>";
				echo "<th><center>ANNO DI PUBBLICAZIONE</center></th>";
				echo "<th><center>ID SUCCURSALE</center></th>";
				echo "</tr>";

                while($row=mysqli_fetch_array($result))
                {
					echo "<tr>";
					echo "<td><center>".$row['ID_LIBRO']."</center></td>";
					echo "<td><center>".$row['TITOLO']."</center></td>";
					if($row['ISBN']==NULL)
						echo "<td><center>isbn non conosciuto</center></td>";
					else
						echo "<td><center>".$row['ISBN']."</center></td>";
					if($row['LINGUA']==NULL)
						echo "<td><center>LINGUA non conosciuta</center></td>";
					else
						echo "<td><center>".$row['LINGUA']."</center></td>";
					if($row['ANNO_PUBBLICAZIONE']==0)
						echo "<td><center>anno non conosciuto</center></td>";
					else
						echo "<td><center>".$row['ANNO_PUBBLICAZIONE']."</center></td>";					
					if($row['IDSUCCURSALE']==0)
					echo "<td><center>id non conosciuto</center></td>";
					else
					echo "<td><center>".$row['IDSUCCURSALE']."</center></td>";					
				echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessun artista che soddisfa i parametri inseriti</h4></center>";
		}
        mysqli_close($link);
        ?>
</body>
</html>