<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ricerca Prestito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="Query7.html">qui</a></label>
    <br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>
    <?php
        include_once('connessione.php');
        $data_uscita = $_POST['data_uscita'];
        $data_restituzione = $_POST['data_restituzione'];
		
        if(($data_uscita!=NULL) && ($data_restituzione!=NULL))
        {

            $sql = "SELECT PRENDE.IDLIBRO, PRENDE.MATRICOLA, PRENDE.DATA_USCITA, PRENDE.DATA_RESTITUZIONE
            FROM PRENDE
            JOIN LIBRO ON PRENDE.IDLIBRO = LIBRO.ID_LIBRO
            WHERE PRENDE.DATA_USCITA >= '$data_uscita' AND PRENDE.DATA_RESTITUZIONE <= '$data_restituzione'
            ORDER BY PRENDE.DATA_USCITA";

            $result = mysqli_query($link, $sql);
            
            if($result && mysqli_num_rows($result) > 0)
            {
                echo "<center><table border='1'>";
                echo "<tr>";
                echo "<th><center>ID LIBRO</center></th>";
                echo "<th><center>MATRICOLA</center></th>";
                echo "<th><center>DATA USCITA</center></th>";
                echo "<th><center>DATA RESTITUZIONE</center></th>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_assoc($result))
                {   
                    echo "<tr>";
                    echo "<td><center>".$row['IDLIBRO']."</center></td>";
                    echo "<td><center>".$row['MATRICOLA']."</center></td>";  
                    if($row['DATA_USCITA']==0)
						echo "<td><center>data uscita non conosciuta</center></td>";
					else
						echo "<td><center>".$row['DATA_USCITA']."</center></td>";
                        if($row['DATA_RESTITUZIONE']==0)
						echo "<td><center>data restituzione non conosciuta</center></td>";
					else
						echo "<td><center>".$row['DATA_RESTITUZIONE']."</center></td>";              
                    echo "</tr>";
                }
                echo "</table></center>";
            }
            else
            {
                echo "Nessun prestito trovato";
            }
        }
        else if(($data_uscita==NULL) && ($data_restituzione==NULL))
        {
            $sql = "SELECT PRENDE.IDLIBRO, PRENDE.MATRICOLA, PRENDE.DATA_USCITA, PRENDE.DATA_RESTITUZIONE
            FROM PRENDE 
            JOIN LIBRO ON PRENDE.IDLIBRO = LIBRO.ID_LIBRO
            WHERE (PRENDE.DATA_RESTITUZIONE >= CURRENT_DATE)
            ORDER BY PRENDE.DATA_RESTITUZIONE";

            $result = mysqli_query($link, $sql);
            
            if($result && mysqli_num_rows($result) > 0)
            {
                echo "<center><table border='1'>";
                echo "<tr>";
                echo "<th><center>ID LIBRO</center></th>";
                echo "<th><center>MATRICOLA</center></th>";
                echo "<th><center>DATA USCITA</center></th>";
                echo "<th><center>DATA RESTITUZIONE</center></th>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td><center>".$row['IDLIBRO']."</center></td>";
                    echo "<td><center>".$row['MATRICOLA']."</center></td>";  
                    if($row['DATA_USCITA']==0)
						echo "<td><center>data uscita non conosciuta</center></td>";
					else
						echo "<td><center>".$row['DATA_USCITA']."</center></td>";
                        if($row['DATA_RESTITUZIONE']==0)
						echo "<td><center>data restituzione non conosciuta</center></td>";
					else
						echo "<td><center>".$row['DATA_RESTITUZIONE']."</center></td>";              
                    echo "</tr>";
                }
                echo "</table></center>";
            }
        }
        mysqli_close($link);
    ?>
</body>
</html>