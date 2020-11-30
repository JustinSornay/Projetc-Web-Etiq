<?php
session_start();
include 'Connecbdd.php';

if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {


  $Req_Info_User = $pdo->prepare('SELECT * from personne Where IdAdherent=?');
  $Req_Info_User->execute(array($_SESSION['IdAdherent']));
  $Info_User = $Req_Info_User->fetch();
}
date_default_timezone_set('Europe/Paris');

$res = $pdo->prepare('INSERT INTO topic(NomTopic, dateOuverture, IdAdherent) VALUES(:NomTopic, :dateOuverture, :IdAdherent)');

$today = date('y-m-d');

$res->bindValue(':NomTopic', $_GET['NomTopic'], PDO::PARAM_STR);
$res->bindValue(':dateOuverture', $today, PDO::PARAM_STR);
$res->bindValue(':IdAdherent', $_SESSION['IdAdherent'], PDO::PARAM_INT);

$insertPdo = $res->execute();

if($insertPdo){
  $message = 'REUSSI';
}
else {
  $message = 'Echec';
}
?>

<html>
<head>
  <title>Insertion de la ligne</title>
  <meta http-equiv="refresh" content="0; URL=../Main-PHP/Forum.php">
</head>
<body>
  <h1>Insertion du Topic</h1>
  <p><?php echo $message ;?></p>
</body>
</html>
