<?php

namespace Calendar;

class Month{
    
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    private $months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout', 'Semptembre', 'Octobre', 'Novembre', 'Decembre'];
    public $month;
    public $year;
    
    /**
     * 
     * @param int $month
     * @param int $year
     * @throws \Exception
     * 
     * 
     * 
     */
    
    
    public function __construct(?int $month = null, ?int $year = null) {
        
        if ($month === null || $month<1 || $month>12){
            (int)$month = intval(date('m'));
                    
        }
          if ($year === null ){
            (int)$year = intval(date('Y'));
                    
          }
       
          $this->month =(int)$month;
          $this->year = (int)$year;
                    
    }
    
  
    
    
    
   public function getStartingDay(): \DateTimeInterface{
       return new \DateTimeImmutable("{$this->year}-{$this->month}-01");
       
   }
           
      /**
    * @return string
    */
   
    public function toString(): string  {
        
        return $this->months[$this->month -1]. ' ' . $this->year;
    }
    
     public function getWeeks(): int  {
      $start = $this->getStartingDay();
        $end = $start->modify('+1 month -1 day');
        $startWeek = intval($start->format('W'));
        $endWeek = intval($end->format('W'));
        
        if ($endWeek === 1){
            
            $endWeek = intval($end->modify('-7 days')->format('W')) +1;
        }        
        $weeks = $endWeek - $startWeek +1;
        if ($weeks<0){
            $weeks = intval($end->format('W'));
        }
        
        return $weeks;
    
     
    
     }
    
    public function withinMonth (\DateTimeInterface $date): bool{
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
        
    }
    
    public function nextMonth (): Month{
        $month = $this-> month +1;
        $year = $this->year;
        
        if($month > 12){
            $month = 1;
            $year += 1; 
        }
        
        return new Month($month, $year);
    }
      public function previousMonth (): Month{
        $month = $this-> month -1;
        $year = $this->year;
        
        if($month < 1){
            $month = 12;
            $year -= 1; 
        }
        
        return new Month($month, $year);
    }
    
    
}
