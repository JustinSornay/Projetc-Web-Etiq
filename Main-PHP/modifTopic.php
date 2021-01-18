<?php
session_start();
include 'Connecbdd.php';

$Req_Info_Del_Topic_Message= $pdo->prepare('DELETE FROM postemess WHERE IdTopic=?');
$Req_Info_Del_Topic_Message->execute(array($_GET['IdTopic']));

$Req_Info_Del_Topic= $pdo->prepare('DELETE FROM topic WHERE IdTopic=?');
$Req_Info_Del_Topic->execute(array($_GET['IdTopic']));

if($Req_Info_Del_Topic){
  $message = 'REUSSI';
}
else {
  $message = 'ECHEC';
}
?>

<html>
<head>
  <title>Insertion de la ligne</title>
</head>
<body>
  <h1>Insertion de l'utilisateur</h1>
  <p><?php echo $message ;?></p>
  <meta http-equiv="refresh" content="0; URL=GestionListeForum.php">
</body>
</html>
