<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of date
 *
 * @author cyril
 */
class Date {
    
    
   var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Di');
   var $months = array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout', 'Semptembre', 'Octobre', 'Novembre', 'Decembre');
   
function getEvents($year){
    global $DB;
    $req = $DB->query("SELECT id, Date, Time FROM creneaux");
    
    $r = array();    
    
    while($d = $req->fetch(PDO::FETCH_OBJ)){
        $r[strtotime($d->Date)][$d->id] = $d->Time;
    }
    
    return $r;
    
    
}
    
    
    
    function getAll($year){
        $r = array();
        
        
        $date = new DateTime($year.'-01-01');
        
        while($date->format('y') <= $year){
            
        
        $y = $date->format('y');
        $m = $date->format('n');
        $d = $date->format('j');
        $w = str_replace('0','7',$date->format('w'));
        
        $r[$y][$m][$d] = $w;
        $date -> add(new DateInterval('P1D'));
        
        
        
        }
        return $r;
        
        }
    //put your code here
}
