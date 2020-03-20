
<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=projet_telethon','root','');

$pdoStat = $objetPdo->prepare('INSERT INTO superviseurs VALUES (:nom_utilisateur, :mot_de_passe');


$pdoStat->bindValue(':nom_utilisateur', $_POST['nom'], PDO::PARAM_STR);
$pdoStat->bindValue(':mot_de_passe', $_POST['mdp'], PDO::PARAM_STR);

$insertIsOk = $pdoStat->execute();


if($insertIsOk)
{
    $message = 'le suuperviseur a été ajouté avec succé';
}else
{
    $message = 'Echec de l/insertion';
}

?>

<html lang="fr" class="translated-ltr"><head>
	<title>Modification Comptes Superviseurs</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
    <h1> insertion superviseurs</h1>
    <p> <?php echo $message;?></p>
    
    </html>