<?php
session_start();
include 'Connecbdd.php';

if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {


  $Req_Info_User = $pdo->prepare('SELECT * from personne Where IdAdherent=?');
  $Req_Info_User->execute(array($_SESSION['IdAdherent']));
  $Info_User = $Req_Info_User->fetch();
}

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <link href="../Main-CSS/Myaccounte.css" rel="stylesheet" type="text/css">
	<title>Myaccounte</title>
</head>
<body>
<div class="session">
	<div class="left">
		<h1>ETIQ</h1> <!-- Titre a gauche -->   <!--texte paragraphe -->
		<p>Bienvenue sur le site web de l'Etiq.</br> Cette plateforme a pour objectif de regrouper</br> les informations de l'association. Elle comprend de nombreuses informations ainsi q'un espace d'échange pour ces membres.</p>

      <a href="deconnexion.php"> <button style="font-size: 15px;" class="btn-join" id="test" type="button">Se déconnecter</button> </a>

	</div>
	<div class="form-login">
		<h4><span>Mon compte</span></h4> <!-- titre a droite-->
		<p>information personelle du compte</p> <!-- sous titre-->

		<div class="floating-label">
			<ul>
				<li>Prénom : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['Prenom']; }else { echo "Connecté vous !";} ?> </li>
				<li>Nom    : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['Nom']; }else { echo "Connecté vous !";} ?></li>
				<li>e-Mail : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['Mail']; }else { echo "Connecté vous !";} ?></li>
				<li>Born   : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['DateNaiss']; }else { echo "Connecté vous !";} ?></li>
				<li>Année  : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['Annee']; }else { echo "Connecté vous !";} ?></li>
				<li>Classe : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['Classe']; }else { echo "Connecté vous !";} ?></li>
				<li>Groupe : <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { echo $Info_User['Groupe']; }else { echo "Connecté vous !";} ?></li>

        <?php
        if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {
          if ($Info_User['Rang'] == 'Admin') { ?>
              <li><a href="administration.php">Gestion Admin</li>
        <?php  }else {
        }
      }
         ?>

			</ul>
		</div>
	</div>
</div>

</body>
</html>
