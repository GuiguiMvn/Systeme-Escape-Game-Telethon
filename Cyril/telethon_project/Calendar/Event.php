<?php

namespace Calendar;

class Event{
    
    private $id;
    
    private $name;
    
    private $description;
    
    private $start;
    
    private $end;
    
    public function getId()
    {
        return $this->id;
        
    }
    
    public function getName(): string {
        return $this->name;
    }
           
     public function getDescription(): string {
        return $this->description ?? '';
    }
    
    public function getStart(): \DateTimeInterface{
        return new \DateTimeImmutable($this->start);
    }
     public function getEnd(): \DateTimeInterface{
        return new \DateTimeImmutable($this->end);
    }
    
    
}
