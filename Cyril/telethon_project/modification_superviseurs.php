

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type = "text/javascript" src="newjavascript.js"></script>

 
   

<body>
     <?php 
include('container.php');
?>
    <?php require "modification_superviseur2.php" ?>
    
    <div class ="container">
        <h1 class ="border border-dark  text-black p-2 my-2 position-center"> <?=$Titre?></h1>
        <?=$content ?>
  
      </div> 
    
 </body>
 
<table class ="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom utilisateur</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                <th> <a href="Ajout_superviseur2.php" class ="btn btn-primary">Ajouter compte superviseur</a></th>
            </tr>              

        </thead>
        <tbody>        
         

            <?php foreach($types as $type) : ?>
            <?php if(!isset($_GET['modifier']) || $_GET['modifier'] !== $type['id']){?>
            <tr>
                <td><?= $type['id']?></td>
                <td><?= $type['login']?></td>
                <td><?= $type['password']?></td>
                <td> <a href="?modifier=<?=$type['id']?>" class="btn btn-primary" >Modifier</a></td>
                <td> <a href="?supprimer=<?=$type['id']?>" class="btn btn-danger" id ="refresh">Supprimer</a></td>
                
           </tr>
  
            <?php } else { ?>
   
        <form method="POST" action="">
            <input type="hidden" name="superviseurs" value="<?= $type['id']?>"/>
            <td><?= $type['id'] ?> </td>
            <td><input type = "text" name ="Nom" value = "<?= $type['login']?>" /> </td>
            <td><input type = "text" name ="Mdp" value = "<?= $type['password']?>" /> </td>

            <td><input type = "submit" class = "btn btn-success" value = "valider" /> </td>
            <td><a href="modification_superviseurs.php" class = "btn btn-dangers"> Quitter </a> </td>
        </form> 
				
			
            <?php } ?>
         <?php endforeach; ?>
        
    
        </tbody>
</table>
 
