<?php ob_start();

    $Titre = "Liste des creneaux";
    ?>
<?php
    $content = ob_get_clean();
    ?>

<?php
$pdo = new PDO("mysql:dbname=projet_telethon;host=localhost", "root", "");

$stmt = $pdo->prepare("SELECT id, Statut, users_id, Date, Time FROM creneaux ORDER BY Date");
$stmt->execute();
$types = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['supprimer'])){
    $stmt = $pdo->prepare("DELETE FROM creneaux WHERE id = :montype");
    $stmt->bindValue(":montype", $_GET['supprimer'], PDO::PARAM_INT);
    $stmt->execute();
} 

 
 if (isset($_POST['modifier'])){
    $stmt = $pdo->prepare("UPDATE creneaux set Statut = :monLibelle, Date = :Date, Time = :Time WHERE id = :montype"); 
    $stmt->bindValue(":montype", $_POST['modifier'], PDO::PARAM_INT);
    $stmt->bindValue(":monLibelle", $_POST['Statut'], PDO::PARAM_INT);
    $stmt->bindValue(":Date", $_POST['Date'], PDO::PARAM_STR);
    $stmt->bindValue(":Time", $_POST['Time'], PDO::PARAM_STR);
    $stmt->execute();
} 

?>



