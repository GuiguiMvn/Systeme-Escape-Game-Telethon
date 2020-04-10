
<?php
//Initialisation de l'objet PDO et ouverture de la connexion pour appel à la base de données
$Pdo_Object = new PDO("mysql:host=localhost;dbname=projet_telethon","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )); 

try {
   //Contrôle de l'éxistance des deux paramètres email et content
   if(!isset($_POST['login'])) throw new Exception("Le paramètre login est absent");
   if(!isset($_POST['password'])) throw new Exception("Le paramètre password est absent");
 
  //Tableau associatif pour requête d'insertion 
  $Arr_Key_Value = array(
                         'login' => $_POST['login'],
                         'password' => $_POST['password']);  
  //Requête d'insertion
  $Sql_Query = "INSERT INTO users(id, login, password, roles_id) VALUES (0, :login,:password, 1)";
  
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

if($Request!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: modification_superviseurs.php');

        }
        
        
        
        
        
