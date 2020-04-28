<?php

//Initialisation de l'objet PDO et ouverture de la connexion pour appel à la base de données
$objetPdo = new PDO("mysql:host=localhost;dbname=projet_telethon","root",""); 

$pdostart = $objetPdo->prepare('SELECT * FROM creneaux WHERE id = :id');

$pdostart ->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

$executeIsok = $pdostart->execute();
$creneaux = $pdostart->fetch();



?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../Inscription/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="../Inscription/css/style.css" />

</head>  
  <?php include('container.php');?> 

<?php                   $heure1 = $creneaux['Time'];
$heure2 = "01:30:00";

$h1 = explode(":", $heure1);
$h2 = explode(":", $heure2);

$h1_h2_addtition =
date('H\Hi', mktime($h1[0]+$h2[0],$h1[1]+$h2[1],$h1[2]+$h2[2],));
 ?>
<body> 
 
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg"></div>
                                       
						<form  action="edit.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $creneaux['id'] ?> ">
							<div class="form-header">
								<h2>Faites votre réservation</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Date</span>
                                                                                <input name="Date"  type="date" required class="form-control" value ="<?= $creneaux['Date']?>" readonly="readonly" >
									</div>
								</div>
						
							</div>
             
                                                    <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Heure</span>
                                                                                <input name="Time" class="form-control" type="" value ="<?= (new DateTimeImmutable($creneaux['Time']))->format('H\Hi') ?> - <?php print_r($h1_h2_addtition) ?>" readonly="readonly">
									</div>
								</div>
						
							</div>
                                      
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" >
										<span class="form-label">Nombre de personnes</span>
										<select class="form-control" name = "NB_joueurs" type = "number" value ="<?= $creneaux['NB_joueurs']; ?>" required>
											<option>1</option>
											<option>2</option>
											<option>3</option>
                                                                                        <option>4</option>
										</select>
										<span  class="select-arrow"></span>
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<span class="form-label">Nom</span>
								<input name="Nom_joueur" class="form-control" type="text" placeholder="Entrer votre nom" value ="<?= $creneaux['Nom_joueur']; ?>" required>
							</div>
                                                                                                   
							<div class="form-group">
								<span class="form-label">Téléphone</span>
								<input name= "Num_joueur" class="form-control" type="tel" placeholder="Entrer votre numéro de téléphone" value ="<?= $creneaux['Num_joueur']; ?>" required>
							</div>
							<div class="form-btn">
								<button class="submit-btn" name="Modifier">Réserver</button>
							</div> 
						</form>
                                              
					</div>
				</div>
                        </div>
		</div>              
	</div>
   
</body>

</html>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>


        
