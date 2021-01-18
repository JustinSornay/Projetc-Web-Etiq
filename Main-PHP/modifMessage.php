<?php
session_start();
include 'Connecbdd.php';

$req_NbTopic = $pdo->prepare('SELECT Distinct IdTopic from postemess WHERE :IdPoste');
$req_NbTopic->bindValue(':IdPoste', $_GET['IdPoste'], PDO::PARAM_INT);
$req_NbTopic->execute();

$Del_Topic_Message= $pdo->prepare('DELETE FROM postemess WHERE IdPoste=?');
$Del_Topic_Message->execute(array($_GET['IdPoste']));

if($Del_Topic_Message){
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
  <h1>Supprimer le message</h1>
  <p><?php echo $message;?></p>
  <script type="text/javascript">
history.go(-1);
</script> 
</body>
</html>
