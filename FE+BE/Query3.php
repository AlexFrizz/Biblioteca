<html lang="it">
<head>
	<meta charset="utf-8">
	<title>Visualizzazione autori</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
	<style>
		body{
			max-width: 1200px;
		}
	</style>
</head>
<body>
	<label>Per effettuare una nuova ricerca premi <a href="Query3.html">qui</a></label>
	<br>
	<a href="index.html" class="btn btn-primary">Indietro</a>
	<br>
	<?php
		include_once('connessione.php');
		
		$cognome = $_POST['cognome'];
		$data_nascita = $_POST['data_nascita'];
		$luogo_nascita = $_POST['luogo_nascita'];
		
		if($cognome==NULL && $data_nascita==NULL && $luogo_nascita==NULL)
			echo "<center><h3 style='color: red;'>Richiesta non valida!</h3></center>";
		else if($cognome!=NULL && $data_nascita!=NULL && $luogo_nascita!=NULL){

            $sql = "SELECT AUTORE.*
                FROM AUTORE
                WHERE AUTORE.COGNOME LIKE '%$cognome%'
                AND AUTORE.DATA_NASCITA LIKE '%$data_nascita%' 
                AND AUTORE.LUOGO_NASCITA LIKE '%$luogo_nascita%'";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>DATA di NASCITA</center></th>";
				echo "<th><center>LUOGO di NASCITA</center></th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuta</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		else if($cognome!=NULL && $data_nascita!=NULL && $luogo_nascita==NULL){
			$sql = "SELECT AUTORE.*
				FROM AUTORE
				WHERE AUTORE.COGNOME LIKE '%$cognome%' AND
					AUTORE.DATA_NASCITA LIKE '%$data_nascita%'";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>DATA di NASCITA</center></th>";
				echo "<th><center>LUOGO di NASCITA</center></th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		else if($cognome!=NULL && $data_nascita==NULL && $luogo_nascita!=NULL){
			$sql = "SELECT AUTORE.*
				FROM AUTORE
				WHERE AUTORE.COGNOME LIKE '%$cognome%' AND
					AUTORE.LUOGO_NASCITA='$luogo_nascita'";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>DATA di NASCITA</center></th>";
				echo "<th><center>LUOGO di NASCITA</center></th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		else if($cognome!=NULL && $data_nascita==NULL && $luogo_nascita==NULL){
			$sql = "SELECT AUTORE.*
				FROM AUTORE
				WHERE AUTORE.COGNOME LIKE '%$cognome%'";
	
		$result = mysqli_query($link, $sql);
		
		if($result && mysqli_num_rows($result)>0){
			echo "<center><table border='1'>";
			echo "<tr>";
			echo "<th><center>ID</center></th>";
			echo "<th><center>COGNOME</center></th>";
			echo "<th><center>DATA di NASCITA</center></th>";
			echo "<th><center>LUOGO di NASCITA</center></th>";
			echo "</tr>";
		
				
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		else if($cognome==NULL && $data_nascita!=NULL && $luogo_nascita!=NULL){
			$sql = "SELECT AUTORE.*
				FROM AUTORE
				WHERE AUTORE.DATA_NASCITA LIKE '%$data_nascita%' AND
					AUTORE.LUOGO_NASCITA='$luogo_nascita'";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>DATA di NASCITA</center></th>";
				echo "<th><center>LUOGO di NASCITA</center></th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		else if($cognome==NULL && $data_nascita!=NULL && $luogo_nascita==NULL){
			$sql = "SELECT AUTORE.*
				FROM AUTORE
				WHERE AUTORE.DATA_NASCITA LIKE '%$data_nascita%'";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>DATA di NASCITA</center></th>";
				echo "<th><center>LUOGO di NASCITA</center></th>";
				echo "</tr>";
				
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		else if($cognome==NULL && $data_nascita==NULL && $luogo_nascita!=NULL){
			$sql = "SELECT AUTORE.*
				FROM AUTORE
				WHERE AUTORE.LUOGO_NASCITA='$luogo_nascita'";
	
			$result = mysqli_query($link, $sql);
			
			if($result && mysqli_num_rows($result)>0){
				echo "<center><table border='1'>";
				echo "<tr>";
				echo "<th><center>ID</center></th>";
				echo "<th><center>COGNOME</center></th>";
				echo "<th><center>DATA di NASCITA</center></th>";
				echo "<th><center>LUOGO di NASCITA</center></th>";
				echo "</tr>";
				while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td><center>".$row['ID_AUTORE']."</center></td>";
					if($row['COGNOME']==NULL)
						echo "<td><center>cognome non conosciuto</center></td>";
					else
						echo "<td><center>".$row['COGNOME']."</center></td>";
					if($row['DATA_NASCITA']==0)
						echo "<td><center>data non conosciuto</center></td>";
					else
						echo "<td><center>".$row['DATA_NASCITA']."</center></td>";
					if($row['LUOGO_NASCITA']==NULL)
						echo "<td><center>luogo non conosciuto</center></td>";
					else
						echo "<td><center>".$row['LUOGO_NASCITA']."</center></td>";
					echo "</tr>";
				}
				echo "<table></center>";
			}
			else
				echo "<center><h4 style='color: red;'>Non esiste nessuna opera che soddisfa i parametri inseriti</h4></center>";
		}
		
		mysqli_close($link);
	?>
</body>
</html>