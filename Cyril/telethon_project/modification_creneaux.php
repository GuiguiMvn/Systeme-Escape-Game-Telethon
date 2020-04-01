<?php ob_start();

    $Titre = "la liste des creneaux";
    ?>
<?php
    $content = ob_get_clean();
    ?>

<?php
$pdo = new PDO("mysql:dbname=projet_telethon;host=localhost", "root", "");

$stmt = $pdo->prepare("SELECT id, Statut, Date, Time FROM creneaux ORDER BY id");
$stmt->execute();
$types = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['supprimer'])){
    $stmt = $pdo->prepare("DELETE FROM creneaux WHERE id = :montype");
    $stmt->bindValue(":montype", $_GET['supprimer'], PDO::PARAM_INT);
    $stmt->execute();
} 

 
 if (isset($_POST['superviseurs'])){
    $stmt = $pdo->prepare("UPDATE creaneaux set Statut = :monLibelle, Date = :st_date, Time = :Time WHERE id = :montype");
    $stmt->bindValue(":montype", $_POST['id'], PDO::PARAM_INT);
    $stmt->bindValue(":monLibelle", $_POST['Statut'], PDO::PARAM_STR);
    $stmt->bindValue(":Date", $_POST['Date'], PDO::PARAM_STR);
    $stmt->bindValue(":Time", $_POST['Time'], PDO::PARAM_STR);
    $stmt->execute();
} 


?>



