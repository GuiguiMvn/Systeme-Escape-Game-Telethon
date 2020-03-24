

<?php
//Initialisation de l'objet PDO et ouverture de la connexion pour appel à la base de données
$Pdo_Object = new PDO("mysql:host=localhost;dbname=projet_telethon","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )); 

try {
   //Contrôle de l'éxistance des deux paramètres email et content
   if(!isset($_POST['nom_utilisateur'])) throw new Exception("Le paramètre email est absent");
   if(!isset($_POST['mot_de_passe'])) throw new Exception("Le paramètre content est absent");

 
  //Tableau associatif pour requête d'insertion 
  $Arr_Key_Value = array(
                         'nom_utilisateur' => $_POST['nom_utilisateur'],
                         'mot_de_passe' => $_POST['mot_de_passe']);  
  //Requête d'insertion
  $Sql_Query = "INSERT INTO superviseurs(idsuperviseurs, nom_utilisateur,mot_de_passe) VALUES (0, :nom_utilisateur,:mot_de_passe)";
  
  //Préparation de la requête (sécurisation des variables du tableau associatif)
  $Request= $Pdo_Object->prepare($Sql_Query);
  
  //Exécution de la requête 
  $Request->execute($Arr_Key_Value);
} catch (Exception $e) {
   echo $e->getMessage(); 
}
finally{
 //Attention le finaly ne fonctionne que sur php 5.6 et supérieur 
 //Fermeture de la connexion en détruisant la référence mémoire à l'objet PDO
 $Pdo_Object = null;
}
