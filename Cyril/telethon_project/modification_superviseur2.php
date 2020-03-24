<?php ob_start();

    $Titre = "la liste des superviseurs";
    ?>
<?php
    $content = ob_get_clean();
    ?>

<?php
$pdo = new PDO("mysql:dbname=projet_telethon;host=localhost", "root", "");

$stmt = $pdo->prepare("SELECT idsuperviseurs, nom_utilisateur, mot_de_passe FROM superviseurs ORDER BY idsuperviseurs");
$stmt->execute();
$types = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['supprimer'])){
    $stmt = $pdo->prepare("DELETE FROM superviseurs WHERE idsuperviseurs = :montype");
    $stmt->bindValue(":montype", $_GET['supprimer'], PDO::PARAM_INT);
    $stmt->execute();
} 

 
 if (isset($_POST['superviseurs'])){
    $stmt = $pdo->prepare("UPDATE superviseurs set nom_utilisateur = :monLibelle, mot_de_passe = :mdp WHERE idsuperviseurs = :montype");
    $stmt->bindValue(":montype", $_POST['superviseurs'], PDO::PARAM_INT);
    $stmt->bindValue(":monLibelle", $_POST['Nom'], PDO::PARAM_STR);
    $stmt->bindValue(":mdp", $_POST['Mdp'], PDO::PARAM_STR);

    $stmt->execute();
} 


?>



