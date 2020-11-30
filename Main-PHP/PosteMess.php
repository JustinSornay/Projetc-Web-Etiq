<?php
session_start();
include 'Connecbdd.php';


if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {


  $Req_Info_User = $pdo->prepare('SELECT * from personne Where IdAdherent=?');
  $Req_Info_User->execute(array($_SESSION['IdAdherent']));
  $Info_User = $Req_Info_User->fetch();
}
date_default_timezone_set('Europe/Paris');

$Req_Info_Topic = $pdo->prepare('SELECT * from Topic WHERE IdTopic= ? ORDER BY dateOuverture ASC');    //
$Req_Info_Topic->execute(array($_GET['IdTopic']));                                                    //  récupération de tout les topics
$Info_Topic = $Req_Info_Topic->fetch();                                                             //

$res = $pdo->prepare('INSERT INTO postemess(Message, HeurePoste, IdTopic, IdAdherent) VALUES(:Message, :HeurePoste, :IdTopic, :IdAdherent)');

$today = date('y-m-d H:i:s');

$res->bindValue(':Message', $_POST['Message'], PDO::PARAM_STR);
$res->bindValue(':HeurePoste', $today, PDO::PARAM_STR);
$res->bindValue(':IdTopic', $Info_Topic['IdTopic'], PDO::PARAM_INT);
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
</head>

<body>
  <h1>Insertion du message</h1>
  <p><?php echo $message ;?></p>
  <meta http-equiv="refresh" content="0; URL=lire_sujet.php?IdTopic=', $Info_Topic['IdTopic'], '">
</body>
</html>
