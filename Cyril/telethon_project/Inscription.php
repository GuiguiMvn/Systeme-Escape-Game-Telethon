<!DOCTYPE html>
<html>
<head>
<title>Saisies obligatoires</title>
<style>
*{
   font-family:calibri;
   font-size:25px;
}
h2 {
   font-size:1.6em;
  color:#666;
}
label{ /* Pour alignement des zones de saisie */
   width:150px;
   display:inline-block;
   margin-bottom:20px;
}
form { /* Cadre du formulaire */
   border:2px solid gray;
   border-radius:10px;
   box-sizing:border-box;
   padding:15px;
   width:600px;
   margin:auto;
} 
input {
   border:2px solid gray;
   border-radius:5px;
}
#submit{ /* Bouton Envoyer */
   display:block;
   width:130px;
   height:40px;
}
</style>

</head>
  
<form id="signaletique">

   <h2>Inscription</h2>

   <label>Nom</label><input type="text" id="nom" required /><br />
   <label>Prénom</label><input type="text" id="prenom" required /><br />
   <label>Date</label><input type="date" id="datenais" required /><br />
   <label>numéro de téléphone</label><input type="text" id="email" required /><br />
   <label>nombre de personne</label><input type="text" id="email" required /><br />

   

   <input type="submit" id="submit" value="Envoyer" />
</form>
</body>
</html>

<?php

    $db_host = "localhost";
    $db_name = "projet_telethon";
    $db_username = "root";
    $db_password = "";
    
    $Nom = filter_input(INPUT_POST, 'Nom');
    $Prenom =  filter_input(INPUT_POST, 'Prenom');
    $NumTelephone= filter_input(INPUT_POST, 'NumTelephone');
    $NBPersonne = filter_input(INPUT_POST, 'NBPersonne');
    $Date = filter_input(INPUT_POST, 'Date');
    
    try{
        //On se connecte à la BDD
      $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
        
            $sql = "INSERT INTO creneaux(Nom, Prenom, NumTelephone, NBPersonne, Date) 
VALUES($Nom,'$Prenom','$NumTelephone','$NBPersonne','$Date')"; 
     
    // on insère les informations du formulaire dans la table 
 
        
        //On renvoie l'utilisateur vers la page de remerciement
        //header("Location:form-merci.html");
  
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }

    ?>