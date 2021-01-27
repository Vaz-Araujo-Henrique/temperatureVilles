<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	<Title>Temperature</Title>>
	</head>
	<body>
		
		<?php
		
		$ville=$_POST['ville'];
		$mysqli = new mysqli("localhost", "root", "", "bdd_temperaturevilles");
		$mysqli -> set_charset("utf8");
		$requete = "SELECT temperature FROM temperaturevilles WHERE ville = '$ville'";
		$resultat = $mysqli -> query($requete);
		
		while ($ligne = $resultat -> fetch_assoc()) {
			echo "Le ";echo $ligne['last_update']; echo " a "; echo heure; echo " il fait fasait "; echo $ligne['temperature']; echo " °K ";echo "a"; echo ucfirst($ville);
		}
		
		$mysqli->close();
		?>
	</body> 
</html>