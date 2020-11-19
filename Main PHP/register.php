<?php
try{


$pdo = new PDO('mysql:host=localhost;dbname=projets1;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}



$res = $pdo->prepare('INSERT INTO personne(Nom, Prenom, Annee, Adherent, mdp, Classe, Groupe, Mail) VALUES(:Nom, :Prenom, :Annee, :membreETIQ, :mdp, :Classe, :Groupe, :Mail)');

$res->bindValue(':Nom', $_GET['Nom'], PDO::PARAM_STR);
$res->bindValue(':Prenom', $_GET['Prenom'], PDO::PARAM_STR);
$res->bindValue(':Annee', $_GET['Annee'], PDO::PARAM_STR);
$res->bindValue(':membreETIQ', $_GET['membreETIQ'], PDO::PARAM_STR);
$res->bindValue(':mdp', $_GET['mdp'], PDO::PARAM_STR);
$res->bindValue(':Classe', $_GET['Classe'], PDO::PARAM_STR);
$res->bindValue(':Groupe', $_GET['Groupe'], PDO::PARAM_STR);
$res->bindValue(':Mail', $_GET['Mail'], PDO::PARAM_STR);

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
