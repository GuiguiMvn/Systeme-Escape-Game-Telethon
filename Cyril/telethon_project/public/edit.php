<?php
$objetPdo = new PDO("mysql:host=localhost;dbname=projet_telethon","root",""); 

$pdostart = $objetPdo->prepare('UPDATE creneaux set Date =:date, Num_joueur=:numero, NB_joueurs=:nb, Nom_joueur=:nom, Time=:time, Statut=REPLACE(Statut, "1", "0") WHERE id=:id');

$pdostart ->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$pdostart ->bindValue(':date', $_POST['Date'], PDO::PARAM_STR);
$pdostart ->bindValue(':nb', $_POST['NB_joueurs'], PDO::PARAM_INT);
$pdostart ->bindValue(':numero', $_POST['Num_joueur'], PDO::PARAM_STR);
$pdostart ->bindValue(':nom', $_POST['Nom_joueur'], PDO::PARAM_STR);
$pdostart ->bindValue(':time', $_POST['Time'], PDO::PARAM_STR);

$executeIsok = $pdostart->execute();


if($executeIsok){

    ?>


 <!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap 4 Thank You Page Template</title>
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css'>

  <?php include ('container.php');?>
  
</head>

<body class="position-center">

  <div class="jumbotron text-xs-center position-center">
  <h1 class="display-3">Merci!</h1>
  <p class="lead"><strong>Merci pour votre inscription</strong>, un message vous sera envoyé une heure avant le créneau</p>
  <hr>

</div>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js'></script>

  

</body>

</html>
<?php
}else {
    ?>

    <!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap 4 Thank You Page Template</title>
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css'>

  
  
</head>

<body>

  <div class="jumbotron text-xs-center">
  <h1 class="display-3">Erreur!</h1>
  <p class="lead"><strong>Votre inscription n'a pas marché</strong>, veuillez réessayer</p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>
  </p>
</div>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js'></script>

  

</body>

</html>
<?php
}

