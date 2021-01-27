<?php
    // connexion à la base
$user = "root";
$pass = "";
$dnspdo = 'mysql:dbname=bdd_temperaturevilles;host=localhost;charset=utf8';

$bdd = new PDO($dnspdo, $user, $pass);

$requete1 = 'SELECT ville FROM temperaturevilles';

$resultat = $bdd->prepare($requete1);
$resultat->execute();

if (!$resultat) {
echo "Probleme de requete";
} else {
?>
<form action="affichage_temperature.php" method="post">
Liste des villes :<br>
<select name="ville">
<?php
while($ligne = $resultat->fetch()) {
echo "<option = '" . $ligne['ville'] . "'>" . ucfirst($ligne['ville']) . "</option>";
}
?>
</select>
<p><input type="submit" value="OK"></p>
<?php
} 
$resultat->closeCursor(); 
    ?>