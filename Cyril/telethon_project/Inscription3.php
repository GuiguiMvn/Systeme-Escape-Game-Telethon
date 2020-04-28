<?php

  include ('../Calendar/Month.php');
    include ('../Calendar/Events.php');
    include  ('../Calendar/bootstrap.php');
    


        
$pdo = get_pdo();
$events = new Calendar\Events($pdo);


 if (!isset($_GET['id'])){
    header('location : /404.php');
} try{
    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}
    

$Arr_Key_Value = array(
                         'Date' => $event['Date'],
                         'NB_joueurs' => $event['NB_joueurs'],
                         'Nom_joueur' => $event['Nom_joueur'],
                         'Num_joueur' => $event['Num_joueur'], 
                         'Time'       => $event['Time']); 



 $this->pdo->query = "INSERT INTO creneaux (Date, NB_joueurs, Nom_joueur, Num_joueur, Time) "
            . "VALUES (".$event['Date'].", ".$event['NB_joueur'].", ".$event['Nom_joueur'].", ".$event['Num_joueur'].", ".$event['Time'].")";
  
        
