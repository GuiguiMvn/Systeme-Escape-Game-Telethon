<html><head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>Calendrier</title> 
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> 
        <script type="text/javascript"> 
          jQuery(function($){ 
              var date = new Date(); 
              var current = date.getMonth()+1; 
              $('.month').hide(); 
              $('#month'+current).show(); 
              $('.months a#linkMonth'+current).addClass('active');
              $('.months a').click(function(){ 
                  var month = $(this).attr('id').replace('linkMonth',''); 
                  if(month != current){ $('#month'+current).slideUp(); 
                      $('#month'+month).slideDown(); 
                      $('.months a').removeClass('active'); 
                      $('.months a#linkMonth'+month).addClass('active'); 
                      current = month; } 
                  return false; 
              }); 
          }); 
      </script> 
    </head> 
    
        
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
        
              <?php
               require('config.php');
               require('date.php');
               $date = new Date();
               $year = date('y');
               $events = $date->getEvents($year);
               $dates = $date-> getAll($year)
     ?>
        
       <div class = "periods">
           <div class ="year"> <?php echo $year; ?> </div>
           <div class ="months">
               <ul>
                   <?php foreach ($date->months as $id=>$m):?>
                   <li><a href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo utf8_encode(substr(utf8_decode($m), 0, 3)); ?> </a></li>
                   <?php endforeach;?>
                   
               </ul>
           </div>
           <div class="clear"></div>
           <?php $dates = current($dates); ?>
           <?php foreach ($dates as $m => $days): ?>
           <div class="month relative" id="month<?php echo $m; ?>">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($date->days as $d): ?>
                            <th> <?php echo substr ($d,0,3); ?> </th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $end = end($days); foreach($days as $d=>$w): ?>
                            <?php $time = strtotime("$year-$m-$d");?>
                            <?php if ($d==1): ?>
                            <td colspan="<?php echo $w-1; ?>" class="padding"></td>
                            <?php endif; ?>
                            <td<?php if($time == strtotime(date('y-m-d'))): ?> class="today" <?php endif; ?>>
                                <div class="relative">
                                    <div class ="day"><?php echo $d; ?></div>
                                </div>  
                                <div class="daytitle"> 
                                <?php echo $date ->days[$w-1]; ?> <?php echo $d ; ?> <?php echo $date ->months[$m-1]; ?>
                                    
                                </div>
                                
                                
                                
                                <ul class= "events">  
                                    <?php if (isset($events[$time])): foreach ($events[$time] as $e) : ?>
                                    <li> <?php echo $e; ?> </li>
                                    <?php endforeach; endif; ?>
                                </ul>
                                
                                
                                    
                            </td>
                            <?php if($w == 7): ?>
                        </tr> <tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if ($end != 7): ?>
                            <td colspan ="<?php echo 7-$end; ?>" class="padding"> </td>
                            <?php endif; ?>
                        </tr>
                     </tbody>       
               </table>
                </div>
                <?php endforeach; ?>
       </div>
        <div class="clear"></div>
      
        
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
               
	</div></div>
</body>
 </html>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>

