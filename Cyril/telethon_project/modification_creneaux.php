<?php
// on se connecte à notre base
  $db_username = 'root';
    $db_password = '';
    $db_name     = 'projet_telethon';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
?>
<html>
<head>
<title>Gestion des comptes superviseurs</title>
</head>
<body>
<?php
// lancement de la requête
$sql ='DELETE administrateur SET adresse="3, rue des tulipes", age="65" WHERE nom="toto"';

// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

// on ferme la connexion à la base
mysql_close();
?>
L'adresse et l'age de Benoît viennent d'être modifiés.
</body>
</html>
