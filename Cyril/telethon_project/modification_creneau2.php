<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type = "text/javascript" src="newjavascript.js"></script>

 <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                 ?>  <div class="alert alert-success text-center">
                     
                        <?php   echo "Bonjour $user, vous etes bien connecté"; ?>
                            </div>
             
<?php
                }
            ?>

<body>
      <?php include('container.php'); ?>
    <?php require "modification_creneaux.php" ?>  
    <div class ="container">
        <h1 class ="  text-black p-2 my-2 position-center"> <?=$Titre?></h1>
        <?=$content ?>
      </div>   
 </body>
<table class ="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Statut</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                <th> <a href="Ajout_creneaux2.php" class ="btn btn-primary">Ajouter créneaux</a> </th>
            </tr>              
        </thead>
        <tbody>        
            <?php foreach($types as $type) : ?>
            <?php if(!isset($_GET['modifier']) || $_GET['modifier'] !== $type['id']){?>
            <tr>
                <td><?= $type['id']?></td>
                <td><?= $type['Statut']?></td>
                <td><?= $type['Date']?></td>
                <td><?= $type['Time']?></td>
                <td> <a href="?modifier=<?=$type['id']?>" class="btn btn-primary" >Modifier</a></td>
                <td> <a href="?supprimer=<?=$type['id']?>" class="btn btn-danger" id ="refresh">Supprimer</a></td>              
           </tr>
            <?php } else { ?>  
        <form method="POST" action="">
            <input type="hidden" name="creneaux" value="<?= $type['id']?>"/>
            <td><?= $type['id'] ?> </td>
            <td><input type = "text" name ="Statut" value = "<?= $type['Statut']?>" /> </td>
            <td><input type = "text" name ="Date" value = "<?= $type['Date']?>" /> </td>
            <td><input type = "text" name ="Time" value = "<?= $type['Time']?>" /> </td>       
            <td><input  type = "submit" class = "btn btn-success" value = "valider" /> </td>
            <td> <a href="modification_creneau2.php" class = "btn btn-dangers"> Quitter </a> </td>
        </form>
            <?php } ?>
         <?php endforeach; ?>
        </tbody>
</table>
 




