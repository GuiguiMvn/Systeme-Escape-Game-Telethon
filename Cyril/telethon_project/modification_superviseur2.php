<?php ob_start();

    $Titre = "la liste des superviseurs";
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
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :montype");
    $stmt->bindValue(":montype", $_GET['supprimer'], PDO::PARAM_INT);
    $stmt->execute();
} 

 
 if (isset($_POST['superviseurs'])){
    $stmt = $pdo->prepare("UPDATE users set login = :monLibelle, password = :mdp WHERE id = :montype");
    $stmt->bindValue(":montype", $_POST['superviseurs'], PDO::PARAM_INT);
    $stmt->bindValue(":monLibelle", $_POST['Nom'], PDO::PARAM_STR);
    $stmt->bindValue(":mdp", $_POST['Mdp'], PDO::PARAM_STR);

    $stmt->execute();
} 

?>

