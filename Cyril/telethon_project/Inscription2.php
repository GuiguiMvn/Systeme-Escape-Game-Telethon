<?php
//Initialisation de l'objet PDO et ouverture de la connexion pour appel à la base de données
$Pdo_Object = new PDO("mysql:host=localhost;dbname=projet_telethon","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )); 

try {
   //Contrôle de l'éxistance des deux paramètres email et content
   if(!isset($_POST['Date'])) throw new Exception("Le paramètre date est absent");
   if(!isset($_POST['NB_joueurs'])) throw new Exception("Le paramètre nb est absent");
   if(!isset($_POST['Nom_joueur'])) throw new Exception("Le paramètre nom est absent");
   if(!isset($_POST['Num_joueur'])) throw new Exception("Le paramètre tel est absent");
   if(!isset($_POST['Time'])) throw new Exception("Le paramètre time est absent");
 
  //Tableau associatif pour requête d'insertion 
  $Arr_Key_Value = array(
                         'Date' => $_POST['Date'],
                         'NB_joueurs' => $_POST['NB_joueurs'],
                         'Nom_joueur' => $_POST['Nom_joueur'],
                         'Num_joueur' => $_POST['Num_joueur'], 
                         'Time'       => $_POST['Time']); 
 
  //Requête d'insertion
  $Sql_Query = "INSERT INTO creneaux (Date, NB_joueurs, Nom_joueur, Num_joueur, Time) VALUES (:Date, :NB_joueurs, :Nom_joueur, :Num_joueur, :Time)";
  
  //Préparation de la requête (sécurisation des variables du tableau associatif)
  $Request= $Pdo_Object->prepare($Sql_Query);
  
  //Exécution de la requête 
  $Request->execute($Arr_Key_Value);
  


  if($Request!=0) // nom d'utilisateur et mot de passe correctes
        {
       $_SESSION['username'] = $username;
           header('Location: index.php');

        }
        
} catch (Exception $e) {
   echo $e->getMessage(); 
}
finally{
 //Attention le finaly ne fonctionne que sur php 5.6 et supérieur 
 //Fermeture de la connexion en détruisant la référence mémoire à l'objet PDO
 $Pdo_Object = null;
}




