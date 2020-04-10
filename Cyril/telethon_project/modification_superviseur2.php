<?php ob_start();
     
    $Titre = "Liste des superviseurs";
    ?>
<?php
    $content = ob_get_clean();
    ?>

<?php
$pdo = new PDO("mysql:dbname=projet_telethon;host=localhost", "root", "");

$stmt = $pdo->prepare("SELECT * FROM users ORDER BY id");
$stmt->execute();
$types = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['supprimer'])){
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :monid");
    $stmt->bindValue(":monid", $_GET['supprimer'], PDO::PARAM_INT);
    $stmt->execute();
} 

 
 if (isset($_POST['modifier'])){
    $stmt = $pdo->prepare("UPDATE users set login = :monNom, password = :mdp WHERE id = :monid");
    $stmt->bindValue(":monid", $_POST['id'], PDO::PARAM_INT);
    $stmt->bindValue(":monNom", $_POST['Nom'], PDO::PARAM_STR);
    $stmt->bindValue(":mdp", $_POST['Mdp'], PDO::PARAM_STR);

    $stmt->execute();
} 

?>

