<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="CSS/styles.css">
        
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/bootstrap-theme.min.css">


        <script src="script.js"></script>

</head>
<body style="background-color: #EBEBEB ">
    
    
    <?php
 
    require '../Calendar/Month.php';
    require '../Calendar/Events.php';
    require '../Calendar/bootstrap.php';
    
     $pdo = get_pdo();
     $month = new Calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
     $events = new Calendar\Events($pdo);
     $start = $month->getStartingDay();
     $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
     $weeks = $month->getWeeks();
     $end = $start->modify('+' . (6 + 7 * ($weeks -1)) . 'days');

     $events = $events->getEventsBetweenByDay($start, $end);   
    
   

     
   
 ?><?php include('container.php');?>
    <div class ="calendar">
        <div align="right" >
     <bol style="color: red; padding-right: 10px">Les heures en verts sont les créneaux disponibles</bol></div> 
    </div>
    <div class=" flex-lg-row align-items-center mx-sm-3">
        <div class=" flex-lg-row position-left mx-sm-3">    
    <h1><?=$month->toString(); ?></h1><link rel="stylesheet" href="css/bootstrap.min.css">
   
	 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <div>
        <a href="index_1.php?month=<?=$month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary" style="background-color:#5F9296; border-color:#5F9296; " >&lt; </a>
        <a href="index_1.php?month=<?=$month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary" style="background-color:#5F9296; border-color:#5F9296; ">&gt; </a>   
      
    </div>
    </div>
 
    <table class="calendar__table calendar__table--<?= $weeks;?>weeks">
      
  <?php for ($i = 0; $i < $weeks; $i++): ?>
        <tr>
            
           <?php  
           foreach ($month->days as $k => $day):  
            $date = $start->modify("+" . ($k + $i * 7) . " days");
           $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
           $isToday = date('Y-m-d') === $date->format('Y-m-d');

            ?>
            
            <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?> <?= $isToday ? 'calendar__today' : ''; ?> ">
              <?php if ($i === 0): ?>  
                <div class="calendar__weekday"><?= $day; ?></div>
              <?php endif; ?>
                <a class="calendar__day"> <?= $date->format('d'); ?> </a>
                <?php foreach($eventsForDay as $event): ?>
                <div class="calendar__event">
                    
                  <?php 
                 
                  $heure1 = $event['Time'];
$heure2 = "01:30:00";

$h1 = explode(":", $heure1);
$h2 = explode(":", $heure2);

$h1_h2_addtition =
date('H\Hi', mktime($h1[0]+$h2[0],$h1[1]+$h2[1],$h1[2]+$h2[2],));


                          
     if($event['Statut'] === '1')
     {
         ?> <a href="event.php?id=<?= $event['id']; ?>" style="color:#3EAC4D;"> <?= (new DateTimeImmutable($event['Time']))->format('H\Hi') ?> - <?php print_r($h1_h2_addtition)?></a> <?php

     }            
        ?>
                     </div>
                  <?php endforeach; ?>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php endfor; ?>
    </table>
        
  </div> 
</body>
</html>
