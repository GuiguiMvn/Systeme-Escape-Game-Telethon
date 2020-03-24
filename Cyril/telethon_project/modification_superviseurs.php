<body>
    
    <?php require "modification_superviseur2.php" ?>
    
    <div class ="container">
        <h1 class ="border border-dark bg-primary rounded-lg text-white p-2 my-2"> <?=$Titre?></h1>
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
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($types as $type); ?>
            <?php if(!isset($_GET['modifier']) || $_GET['modifier'] !== $type['idsuperviseurs']){?>
            <tr>
                <td><?= $type['idsuperviseurs']?></td>
                <td><?= $type['nom_utilisateur']?></td>
                <td><?= $type['mot_de_passe']?></td>
                <td> <a href="?modifier=<?=$type['idsuperviseurs']?>" class="btn btn-primary">Modifier</a></td>
                <td> <a href="?supprimer=<?=$type['idsuperviseurs']?>" class="btn btn-danger">Supprimmer</a></td>
                <td> <a href="Ajout_superviseur2.php" class ="btn btn-primary">Ajouter</a>
           </tr>
            
            <?php } else { ?>
        <form method="POST" action="">
            <input type="hidden" name="superviseurs" value="<?= $type['idsuperviseurs']?>"/>
            <td><?= $type['idsuperviseurs'] ?> </td>
            <td><input type = "text" name ="Nom" value = "<?= $type['nom_utilisateur']?>" /> </td>
            <td><input type = "text" name ="Mdp" value = "<?= $type['mot_de_passe']?>" /> </td>

            <td><input type = "submit" class = "btn btn-success" value = "valider" /> </td>
            <td><a href="index.php" class = "btn btn-dangers"> Annuler </a> </td>
        </form>
            <?php } ?>
        
        </tbody>
</table>
 
<html lang="fr" class="translated-ltr"><head>
<title>Tableau V02</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="Table_Responsive_v2/images/icons/favicon.ico">

<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/vendor/perfect-scrollbar/perfect-scrollbar.css">

<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/css/util.css">
<link rel="stylesheet" type="text/css" href="Table_Responsive_v2/css/main.css">

<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css"></head>
<body>
<div class="limiter">
<div class="container-table100">
<div class="wrap-table100">
<div class="table">
<div class="row header">
<div class="cell"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
#
</font></font></div>
<div class="cell"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Nom utilisateur
</font></font></div>
<div class="cell"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Mot de passe
</font></font></div>
<div class="cell"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Modifier
</font></font></div>
    <div class="cell"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Supprimer
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Supprimer
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
31
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Développeur iOS
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Washington
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Joseph Smith
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
27
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Gestionnaire de projet
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Somerville, MA
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Justin Black
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
26
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Développeur frontal
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Los Angeles
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Sean Guzman
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
25
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Concepteur Web
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
San Francisco
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Keith Carter
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
20
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Designer graphique
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
New York, NY
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Austin Medina
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
 32
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Photographe
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
New York
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Vincent Williamson
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
31
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Développeur iOS
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Washington
</font></font></div>
</div>
<div class="row">
<div class="cell" data-title="Full Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Joseph Smith
</font></font></div>
<div class="cell" data-title="Age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
27
</font></font></div>
<div class="cell" data-title="Job Title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Gestionnaire de projet
</font></font></div>
<div class="cell" data-title="Location"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Somerville, MA
</font></font></div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>

<script src="vendor/bootstrap/js/popper.js" type="text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="vendor/select2/select2.min.js" type="text/javascript"></script>

<script src="js/main.js" type="text/javascript"></script>

<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
<script type="text/javascript">
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<div id="goog-gt-tt" class="skiptranslate" dir="ltr"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.gstatic.com/images/branding/product/1x/translate_24dp.png" width="20" height="20" alt="Google Traduction"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texte d'origine</h1></div><div class="middle" style="padding: 8px;"><div class="original-text"></div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Proposer une meilleure traduction</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none;"></div></div>

<div class="goog-te-spinner-pos"><div class="goog-te-spinner-animation"><svg xmlns="http://www.w3.org/2000/svg" class="goog-te-spinner" width="96px" height="96px" viewBox="0 0 66 66"><circle class="goog-te-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div></div></body></html>