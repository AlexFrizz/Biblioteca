<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Statistica Prestiti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="QueryF2.html">qui</a></label>
    <br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');

        $sql = "SELECT L.TITOLO, AVG(DATEDIFF(P.DATA_RESTITUZIONE, P.DATA_USCITA)) AS DurataMediaPrestito
        FROM LIBRO L
        JOIN PRENDE P ON L.ID_LIBRO = P.IDLIBRO
        GROUP BY L.TITOLO";
        /*
        $sql = "SELECT AVG(DATEDIFF(DATA_RESTITUZIONE, DATA_USCITA)) AS DurataMediaPrestito
        FROM PRENDE";
        */
                                                                                                                 

        $result = mysqli_query($link, $sql);

        if($result && mysqli_num_rows($result)>0)
        {
            echo "<center><table border='1'>";
            echo "<tr>";
            echo "<th><center>TITOLO</center></th>";
            echo "<th><center>DURATA MEDIA</center></th>";
            echo "</tr>";

            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td><center>".$row['TITOLO']."</center></td>";	
                echo "<td><center>".$row['DurataMediaPrestito']."</center></td>";		
                echo "</tr>";
            }
            echo "<table></center>";
        }
    

        mysqli_close($link);
        ?>
</body>
</html>