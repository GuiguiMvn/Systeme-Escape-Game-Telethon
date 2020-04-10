<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="CSS/styles.css">

        <script src="script.js"></script>

</head>
<body>
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
  
 
   
 ?>
    <div class ="calendar">
    <div class="d-flex flex-lg-row align-items-center justify-content-between mx-sm-3">
    <h1><?=$month->toString(); ?></h1>
    <div>
        <a href="index_1.php?month=<?=  $month->previousMonth()->month; ?> &year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt; </a>
        <a href="index_1.php?month=<?= $month->nextMonth()->month; ?> &year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt; </a>   
      
    </div>
    </div>
 
    <table class="calendar__table calendar__table--<?= $weeks;?>weeks">
      
  <?php for ($i = 0; $i < $weeks; $i++): ?>
        <tr>
            
           <?php  
           foreach ($month->days as $k => $day):  
            $date = $start->modify("+" . ($k + $i * 7) . " days");
           $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
            ?>
            
            <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?> ">
              <?php if ($i === 0): ?>  
                <div class="calendar__weekday"><?= $day; ?></div>
              <?php endif; ?>
                <a class="calendar__day"> <?= $date->format('d'); ?> </a>
                <?php foreach($eventsForDay as $event): ?>
                <div class="calendar__event">
                    
                <a href="event.php?id=<?= $event['id']; ?>"> <?= $event['Time']; ?> </a>
                    
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
