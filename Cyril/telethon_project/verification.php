<?php
session_start(); 

if(isset($_POST['login']) && isset($_POST['password']))
{
        // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'projet_telethon';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['login'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));


if($username !== "" && $password !== "")
     
 {
    
$rec = $db->query("SELECT count(*) FROM users WHERE roles_id = '1' "); 



$donnees = $rec->fetchAll();


if ($donnees == true){
    
    
        $requete1 = "SELECT count(*) FROM users WHERE login='$username' AND password='$password'";
  $exec_requete1 = mysqli_query($db,$requete1);
  $reponse1     = mysqli_fetch_array($exec_requete1);
  $count1 = $reponse1                                                                                                                                                                   ['count(*)'];
  
  
    if($count1 == true) { // on a un résultat qui correspond
   // initialisation des variables de session avec les données de la ligne récupérée
   $_SESSION['login'] = $username;
   header('Location: modification_superviseurs.php');
 }
 
 
}
 
elseif ("roles_id = '2'") {

       
     $requete = "SELECT count(*) FROM users WHERE login='$username' AND password='$password'";
  $exec_requete = mysqli_query($db,$requete);
  $reponse      = mysqli_fetch_array($exec_requete);
  $count = $reponse['count(*)'];
    
   if($count == true) { // on a un résultat qui correspond
   // initialisation des variables de session avec les données de la ligne récupérée
   $_SESSION['login'] = $username;
   header('Location: calendar/modification_creneau2.php');

   }   
} 
} else { // mauvais identifiant ou mot de passe
   echo"Mauvais identifiant ou mot de passe, veuillez ressaisir"; // ici je te conseille de ne pas faire de echo directement en haut de ta page car cela s'afficherait en haut au lieu de sous les champs de saisi par exemple (c'est juste pour l'exemple)
}}