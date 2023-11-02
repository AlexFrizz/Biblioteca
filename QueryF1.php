<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Statistica Libri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
<body>
    <label>Per effettuare una nuova ricerca premi <a href="QueryF1.html">qui</a></label>
    <br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>    
    <?php
        include_once('connessione.php');

        $sql = "SELECT S.ID_SUCCURSALE, S.NOME AS Succursale, LP.TITOLO AS LibroMenoPreso
                FROM BIBLIOTECA.SUCCURSALE S
                LEFT JOIN (
                    SELECT L.IDSUCCURSALE, MIN(NumPrestiti) AS MinPrestiti
                    FROM (
                        SELECT L.IDSUCCURSALE, L.TITOLO, COUNT(P.ID_PRESTITO) AS NumPrestiti
                        FROM BIBLIOTECA.LIBRO L
                        LEFT JOIN BIBLIOTECA.PRENDE P ON L.ID_LIBRO = P.IDLIBRO
                        GROUP BY L.IDSUCCURSALE, L.TITOLO
                    ) LibriPrestiti
                    GROUP BY LibriPrestiti.IDSUCCURSALE
                ) MinLibroPrestito ON S.ID_SUCCURSALE = MinLibroPrestito.IDSUCCURSALE
                LEFT JOIN (
                    SELECT L.IDSUCCURSALE, L.TITOLO
                    FROM (
                        SELECT L.IDSUCCURSALE, L.TITOLO, COUNT(P.ID_PRESTITO) AS NumPrestiti
                        FROM BIBLIOTECA.LIBRO L
                        LEFT JOIN BIBLIOTECA.PRENDE P ON L.ID_LIBRO = P.IDLIBRO
                        GROUP BY L.IDSUCCURSALE, L.TITOLO
                    ) LibriPrestiti
                ) LP ON S.ID_SUCCURSALE = LP.IDSUCCURSALE AND MinLibroPrestito.MinPrestiti = 0";
                                                                                                                 
/*
        $sql = "SELECT SUCCURSALE.NOME, LIBRO.TITOLO, LIBRO.ID_LIBRO, COALESCE(P.NumeroPrestiti, 0) AS NumeroPrestiti
        FROM SUCCURSALE
        JOIN LIBRO ON SUCCURSALE.LIBRO_ID = LIBRO.ID_LIBRO
        LEFT JOIN (
            SELECT IDLIBRO, COUNT(*) AS NumeroPrestiti
            FROM PRENDE
            GROUP BY IDLIBRO
        ) P ON LIBRO.ID_LIBRO = P.IDLIBRO
        WHERE P.NumeroPrestiti IS NULL OR P.NumeroPrestiti = (
            SELECT MIN(NumeroPrestiti)
            FROM (
            SELECT IDLIBRO, COUNT(*) AS NumeroPrestiti
            FROM PRENDE
            GROUP BY IDLIBRO
            ) TMP
        )";
*/
        $result = mysqli_query($link, $sql);

        if($result && mysqli_num_rows($result)>0)
        {
            echo "<center><table border='1'>";
            echo "<tr>";
            echo "<th><center>ID SUCCURSALE</center></th>";
            echo "<th><center>NOME</center></th>";
            echo "<th><center>TITOLO</center></th>";
            echo "</tr>";

            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td><center>".$row['ID_SUCCURSALE']."</center></td>";
                echo "<td><center>".$row['NOME']."</center></td>";
                echo "<td><center>".$row['TITOLO']."</center></td>";	
                echo "</tr>";
            }
            echo "<table></center>";
        }
    

        mysqli_close($link);
        ?>
</body>
</html>