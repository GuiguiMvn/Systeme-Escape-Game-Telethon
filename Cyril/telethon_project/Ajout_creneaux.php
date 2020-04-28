<?php
//Initialisation de l'objet PDO et ouverture de la connexion pour appel à la base de données
$Pdo_Object = new PDO("mysql:host=localhost;dbname=projet_telethon","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )); 

try {
   //Contrôle de l'éxistance des deux paramètres email et content
   if(!isset($_POST['Date'])) throw new Exception("Le paramètre Date est absent");
 if(!isset($_POST['Time'])) throw new Exception("Le paramètre Time est absent");
 
  //Tableau associatif pour requête d'insertion 
  $Arr_Key_Value = array(
                         
                         'Date' => $_POST['Date'],
                         'Time' => $_POST['Time']);  
  
  
  //Requête d'insertion
  $Sql_Query = "INSERT INTO creneaux(id, Date, Time) VALUES (0, :Date, :Time)";

  //Préparation de la requête (sécurisation des variables du tableau associatif)
  $Request= $Pdo_Object->prepare($Sql_Query);
  
  //Exécution de la requête 
  $Request->execute($Arr_Key_Value);
  
  if($Request!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: modification_creneau2.php');

        }
  
} catch (Exception $e) {
   echo $e->getMessage(); 
}

finally{
 //Attention le finaly ne fonctionne que sur php 5.6 et supérieur 
 //Fermeture de la connexion en détruisant la référence mémoire à l'objet PDO
 $Pdo_Object = null;
}

try{
    $DB = new PDO("mysql:host=localhost;dbname=projet_telethon","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch (Exception $ex) {
echo 'base de donnée en vacance';
exit();
}



