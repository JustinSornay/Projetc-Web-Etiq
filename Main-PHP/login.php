<?php
include 'Connecbdd.php';


  $Mail = $_POST['Mail'];
  $log = $pdo->prepare('SELECT IdAdherent, mdp FROM personne WHERE Mail= :Mail');
  $log->execute(array('Mail' => $Mail));
  $resultat = $log->fetch();

    $PassCorrect = password_verify($_POST['mdp'], $resultat['mdp']);


  if ($PassCorrect) {
    session_start();
    $_SESSION['IdAdherent'] = $resultat['IdAdherent'];
    $_SESSION['Mail'] = $Mail;
      echo "Vous êtes connecté !";

    }
  else {
    echo "Mauvais identifiant ou mot de passe !";
  }


 ?>
