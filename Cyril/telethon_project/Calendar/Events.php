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
        
        public function find (int $id): array{
            
          return $this->pdo->query("SELECT * FROM creneaux WHERE id = $id")->fetch();
        
           
        }

}
















































































