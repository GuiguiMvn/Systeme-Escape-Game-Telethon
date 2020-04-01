<!DOCTYPE html>
<html lang="en">

 <?php 
include('container.php');
?>    
    
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

	<!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="Inscription/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="Inscription/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
    
<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg"></div>
						<form  action="Inscription2.php" method="post">
							<div class="form-header">
								<h2>Faites votre réservation</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Date</span>
                                                                                <input name="Date" class="form-control" type="date" required>
									</div>
								</div>
						
							</div>
                                                    
                                                    <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Heure</span>
                                                                                <input name="Time" class="form-control" type="time" required>
									</div>
								</div>
						
							</div>
                                                    
                                                   
                                                    
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" >
										<span class="form-label">Nombre de personnes</span>
										<select class="form-control" name = "NB_joueurs" type = "number">
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
								<input name="Nom_joueur" class="form-control" type="text" placeholder="Entrer votre nom">
							</div>
                                                                                                   
							<div class="form-group">
								<span class="form-label">Téléphone</span>
								<input name= "Num_joueur" class="form-control" type="tel" placeholder="Entrer votre numéro de téléphone">
							</div>
							<div class="form-btn">
								<button class="submit-btn" name="valider">Réserver</button>
							</div>
						</form>
                                                    
 
					</div>
				</div>
			</div>
		</div>
               
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<?php include('footer.php');?>