<?php
try{


$pdo = new PDO('mysql:host=localhost;dbname=projets1;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}



$res = $pdo->prepare('INSERT INTO personne(Nom, Prenom, mdp, Mail, Tel, DateNaiss) VALUES(:Nom, :Prenom, :mdp, :Mail, :Tel, :DateNaiss)');

$res->bindValue(':Nom', $_GET['Nom'], PDO::PARAM_STR);
$res->bindValue(':Prenom', $_GET['Prenom'], PDO::PARAM_STR);
$res->bindValue(':mdp', $_GET['mdp'], PDO::PARAM_STR);
$res->bindValue(':Mail', $_GET['Mail'], PDO::PARAM_STR);
$res->bindValue(':Tel', $_GET['telephone'], PDO::PARAM_STR);
$res->bindValue(':DateNaiss', $_GET['born'], PDO::PARAM_STR);

$insertPdo = $res->execute();

if($insertPdo){
  $message = 'REUSSI';
}
else {
  $message = 'go te suicider';
}
?>

<html>
<head>
  <title>Insertion de la ligne</title>
</head>
<body>
  <h1>Insertion de l'utilisateur</h1>
  <p><?php echo $message ;?></p>
</body>
</html>
