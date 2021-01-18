<?php
include 'Connecbdd.php';

if ($_POST['Nom'] !== "") {
  $updateNom = $pdo->prepare('UPDATE personne SET Nom = :Nom WHERE IdAdherent = :IdAdherent');
  $updateNom->bindValue(':Nom', $_POST['Nom'], PDO::PARAM_STR);
            $updateNom->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateNom = $updateNom->execute();
}else {
  $insertUpdateNom = FALSE;
}

if ($_POST['Prenom'] !== "") {
  $updatePrenom = $pdo->prepare('UPDATE personne SET Prenom = :Prenom WHERE IdAdherent = :IdAdherent');
  $updatePrenom->bindValue(':Prenom', $_POST['Prenom'], PDO::PARAM_STR);
            $updatePrenom->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdatePrenom = $updatePrenom->execute();
}else {
  $insertUpdatePrenom = FALSE;
}

if ($_POST['Annee'] !== "") {
  $updateAnnee = $pdo->prepare('UPDATE personne SET Annee = :Annee WHERE IdAdherent = :IdAdherent');
  $updateAnnee->bindValue(':Annee', $_POST['Annee'], PDO::PARAM_STR);
            $updateAnnee->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateAnnee = $updateAnnee->execute();
}else {
  $insertUpdateAnnee = FALSE;
}

if ($_POST['Classe'] !== "") {
  $updateClasse = $pdo->prepare('UPDATE personne SET Classe = :Classe WHERE IdAdherent = :IdAdherent');
  $updateClasse->bindValue(':Classe', $_POST['Classe'], PDO::PARAM_STR);
            $updateClasse->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateClasse = $updateClasse->execute();
}else {
  $insertUpdateClasse = FALSE;
}

if ($_POST['Groupe'] !== "") {
  $updateGroupe = $pdo->prepare('UPDATE personne SET Groupe = :Groupe WHERE IdAdherent = :IdAdherent');
  $updateGroupe->bindValue(':Groupe', $_POST['Groupe'], PDO::PARAM_STR);
            $updateGroupe->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateGroupe = $updateGroupe->execute();
}else {
  $insertUpdateGroupe = NULL;
}

if ($_POST['Tel'] !== "") {
  $updateTel = $pdo->prepare('UPDATE personne SET Tel = :Tel WHERE IdAdherent = :IdAdherent');
  $updateTel->bindValue(':Tel', $_POST['Tel'], PDO::PARAM_STR);
            $updateTel->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateTel = $updateTel->execute();
}else {
  $insertUpdateTel = NULL;
}

if ($_POST['born'] !== "") {
  $updateBorn = $pdo->prepare('UPDATE personne SET DateNaiss = :DateNaiss WHERE IdAdherent = :IdAdherent');
  $updateBorn->bindValue(':DateNaiss', $_POST['born'], PDO::PARAM_STR);
            $updateBorn->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateBorn = $updateBorn->execute();
}else {
  $insertUpdateBorn = NULL;
}

if ($_POST['Rang'] !== "") {
  $updateRang = $pdo->prepare('UPDATE personne SET Rang = :Rang WHERE IdAdherent = :IdAdherent');
  $updateRang->bindValue(':Rang', $_POST['Rang'], PDO::PARAM_STR);
            $updateRang->bindValue(':IdAdherent', $_GET['IdAdherent'], PDO::PARAM_INT);
  $insertUpdateRang = $updateRang->execute();
}else {
  $insertUpdateRang = NULL;
}

//$update->bindValue(':Prenom', $_GET['Prenom'], PDO::PARAM_STR);
//$update->bindValue(':mdp', password_hash($_GET['mdp'], PDO::PARAM_STR));
//$update->bindValue(':Mail', $_GET['Mail'], PDO::PARAM_STR);
//$update->bindValue(':Tel', $_GET['telephone'], PDO::PARAM_STR);
//$update->bindValue(':DateNaiss', $_GET['born'], PDO::PARAM_STR);

//$res = $pdo->prepare('INSERT INTO personne(Nom, Prenom, mdp, Mail, Tel, DateNaiss) VALUES(:Nom, :Prenom, :mdp, :Mail, :Tel, :DateNaiss)');

//$res->bindValue(':Nom', $_GET['Nom'], PDO::PARAM_STR);
//$res->bindValue(':Prenom', $_GET['Prenom'], PDO::PARAM_STR);
//$res->bindValue(':mdp', password_hash($_GET['mdp'], PDO::PARAM_STR));
//$res->bindValue(':Mail', $_GET['Mail'], PDO::PARAM_STR);
//$res->bindValue(':Tel', $_GET['telephone'], PDO::PARAM_STR);
//$res->bindValue(':DateNaiss', $_GET['born'], PDO::PARAM_STR);

//$insertPdo = $res->execute();

if($insertUpdateNom){
  $messageNom = 'Modif Nom : REUSSI <--';
}
else {
  $messageNom = 'Modif Nom : ECHEC';
}

if($insertUpdatePrenom){
  $messagePrenom = 'Modif Prenom : REUSSI <--';
}
else {
  $messagePrenom = 'Modif Prenom : ECHEC';
}

if($insertUpdateAnnee){
  $messageAnnee = 'Modif Année : REUSSI <--';
}
else {
  $messageAnnee = 'Modif Année : ECHEC';
}

if($insertUpdateClasse){
  $messageClasse = 'Modif Classe : REUSSI <--';
}
else {
  $messageClasse = 'Modif Classe : ECHEC';
}

if($insertUpdateGroupe){
  $messageGroupe = 'Modif Groupe : REUSSI <--';
}
else {
  $messageGroupe = 'Modif Groupe : ECHEC';
}

if($insertUpdateTel){
  $messageTel = 'Modif Tel : REUSSI <--';
}
else {
  $messageTel = 'Modif Tel : ECHEC';
}

if($insertUpdateBorn){
  $messageBorn = 'Modif Date de Naissance : REUSSI <--';
}
else {
  $messageBorn = 'Modif Date de Naissance : ECHEC';
}

if($insertUpdateRang){
  $messageRang = 'Modif Rang : REUSSI <--';
}
else {
  $messageRang = 'Modif Rang : ECHEC';
}
?>

<html>
<head>
  <title>Insertion de la ligne</title>
</head>
<body>
  <h1>Insertion de l'utilisateur</h1>
  <p><?php echo $messageNom ;?></p>
  <p><?php echo $messagePrenom ;?></p>
  <p><?php echo $messageAnnee ;?></p>
  <p><?php echo $messageClasse ;?></p>
  <p><?php echo $messageGroupe ;?></p>
  <p><?php echo $messageTel ;?></p>
  <p><?php echo $messageBorn ;?></p>
  <p><?php echo $messageRang ;?></p>
  <meta http-equiv="refresh" content="0; URL=administration.php">
</body>
</html>
