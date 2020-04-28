<?php

namespace Calendar;

class Events {
    
    
    private $pdo;
    
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function getEventsBetween (\DateTimeInterface $start, \DateTimeInterface $end): array{
        
   
        $sql = "SELECT * FROM creneaux WHERE Date BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('y-m-d 23:59:59')}'ORDER BY Date ASC";
        
        
        $statement = $this->pdo->query($sql);        
        $results = $statement->fetchAll();
         return $results;

        
    }
    
        public function getEventsBetweenByDay (\DateTimeInterface $start, \DateTimeInterface $end): array{
            $events = $this->getEventsBetween($start, $end);
            $days = [];
            foreach ($events as $event){
                $date = explode(' ', $event['Date'])[0];
                if(!isset($days[$date])){
                    $days[$date] = [$event];
                }else{
                    $days[$date][] = $event;
                }
                
            }
            return $days;
        }
        
        public function find(int $id): array{
            
          return $this->pdo->query("SELECT * FROM creneaux WHERE id = $id")->fetch();
 
        }
        
        public function hydrate (Event $event, array $data){
            $event -> $_GET[$data['Date']];
 $event -> $_GET[$data['NB_joueurs']];
$event -> $_GET[$data['Nom_joueur']];
 $event -> $_GET[$data['Num_joueur']];
 $event -> $_GET[$data['Time']];
 
 return $event;
        }
        
       public function create (Event $event): bool {
          $statement= $this->pdo->prepare('Date, NB_joueurs, Nom_joueur, Num_joueur, Time) VALUES (?,?,?,?,?)');
           return $statement->execute([
               $event -> $_GET['Date'],
                         $event -> $_GET['NB_joueurs'],
                         $event -> $_GET['Nom_joueur'],
                         $event -> $_GET['Num_joueur'],
                         $event -> $_GET['Time'],
               
           ]);
       }
        
           public function update ($event): bool {
          $statement= $this->pdo->prepare('UPDATE creneaux SET Date = ?, NB_joueurs = ?, Nom_joueur= ?, Num_joueur= ?, Time= ?');
           return $statement->execute([
               $event -> $_GET['Date'],
                         $event -> $_GET['NB_joueurs'],
                         $event -> $_GET['Nom_joueur'],
                         $event -> $_GET['Num_joueur'],
                         $event -> $_GET['Time'],
               
           ]);
       }
        

}































































































