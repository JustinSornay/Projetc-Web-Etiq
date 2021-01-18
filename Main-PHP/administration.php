<?php
session_start();
include 'Connecbdd.php';



if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {
  $Req_Info_User = $pdo->prepare('SELECT * from personne Where IdAdherent=?');
  $Req_Info_User->execute(array($_SESSION['IdAdherent']));
  $Info_User = $Req_Info_User->fetch();
}

if (($Info_User['Rang'] == 'Admin') OR ($Info_User['Rang'] == 'Moderateur')) {
  $All_User = $pdo->prepare('SELECT * from personne Order by nom ASC');
  $All_User->execute();
  $All_User_Info = $All_User->fetch();
}

 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Administration</title>
  <link rel="stylesheet" href="../Main-CSS/style.css"/>
  <link rel="stylesheet" href="../Main-CSS/administration.css"/>
</head>

<body>
<header>
    <img src="../Image/LogoETIQ.png" class="logoETIQ" alt="logo etiq">
    <h1 id="mainTitle">Etiq</h1><p id="descMainTitle">IUT informatique Dijon</p>
    <nav class="headerAccueil">
        <ul>
            <li class="deroulante"><a href="accueil.php" class="menu">Accueil</a></li>

            <li class="deroulante"><a href="GestionListeForum.php" class="menu">Gestion Forum</a>

            </li>
        </ul>
    </nav>
</header>


    <?php
    $Req_Nb_User_NonAd = $pdo->query('SELECT count(*) as total from personne Where Rang="NonAhderent" ');
    $Nb_User_NonAd = $Req_Nb_User_NonAd->fetch();
    $Req_Nb_User_NonAd->closeCursor();

    $Req_Nb_User_Ad = $pdo->query('SELECT count(*) as total from personne Where Rang="Ahderent" ');
    $Nb_User_Ad = $Req_Nb_User_Ad->fetch();
    $Req_Nb_User_Ad->closeCursor();

    $Req_Nb_User_Mod = $pdo->query('SELECT count(*) as total from personne Where Rang="Moderateur" ');
    $Nb_User_Mod = $Req_Nb_User_Mod->fetch();
    $Req_Nb_User_Mod->closeCursor();

    $Req_Nb_User_Admin = $pdo->query('SELECT count(*) as total from personne Where Rang="Admin" ');
    $Nb_User_Admin = $Req_Nb_User_Admin->fetch();
    $Req_Nb_User_Admin->closeCursor();

    echo '<div class="menuAdmin"><ul><li>','Nombre de Non-Adhérent : ', $Nb_User_NonAd['total'], '</li>';
    echo '<li>Nombre de Adhérent : ', $Nb_User_Ad['total'], '</li>';
    echo '<li>Nombre de Modérateur : ', $Nb_User_Mod['total'], '</li>';
    echo '<li>Nombre admin : ', $Nb_User_Admin['total'], '</li></ul></div><div class="PersonneListe"> <ul>';

    while ($All_User_Info = $All_User->fetch()) {

      $All_User_Info_Check = array(
          'Nom' => "Pas de Nom",
          'Prenom' => "Pas de Prenom",
          'Annee' => "Ø",
          'Classe' => "Ø",
          'Groupe' => "Ø",
          'Tel' => "Ø",
          'DateNaiss' => "Ø",
          'Rang' => "Ø",
      );

      if ($All_User_Info['Nom'] !=="") {
          $All_User_Info_Check['Nom'] = $All_User_Info['Nom'];
      }
      if ($All_User_Info['Prenom'] !=="") {
          $All_User_Info_Check['Prenom'] = $All_User_Info['Prenom'];
      }
      if ($All_User_Info['Annee'] !== null) {
          $All_User_Info_Check['Annee'] = $All_User_Info['Annee'];
      }
      if ($All_User_Info['Classe'] !== null) {
          $All_User_Info_Check['Classe'] = $All_User_Info['Classe'];
      }
      if ($All_User_Info['Groupe'] !== null) {
          $All_User_Info_Check['Groupe'] = $All_User_Info['Groupe'];
      }
      if ($All_User_Info['Tel'] !== null) {
          $All_User_Info_Check['Tel'] = $All_User_Info['Tel'];
      }
      if ($All_User_Info['DateNaiss'] !== null) {
          $All_User_Info_Check['DateNaiss'] = $All_User_Info['DateNaiss'];
      }
      if ($All_User_Info['Rang'] !== null) {
          $All_User_Info_Check['Rang'] = $All_User_Info['Rang'];
      }

      echo '<li>', $All_User_Info_Check['Nom'], ' ', $All_User_Info_Check['Prenom'],' | Annee = ', $All_User_Info_Check['Annee'],' | Classe = ', $All_User_Info_Check['Classe'], ' | Groupe = ', $All_User_Info_Check['Groupe'],' | Tel = ', $All_User_Info_Check['Tel'],' | Date de Naissance (Format US) = ', $All_User_Info_Check['DateNaiss'],' | Rang = ', $All_User_Info_Check['Rang'],
       '<form class="gestionAdmin" action="modifUser.php?IdAdherent=', $All_User_Info['IdAdherent'], '" method="post">

       <input placeholder="Modifier le Nom" type="text" name="Nom" id="lastname"  >
       <label for="lastname"></label>
       ', ' | ',

        '<input placeholder="Modifier le Prénom" type="text" name="Prenom" id="lastname"  >
        <label for="lastname"></label>
        ', ' | ','

        <select name="Annee" id="Annee">
        <label for="Annee"></label>
          <option value="">Changer Annee</option>
          <option value="NULL">Aucune Annee</option>
          <option value="1">1</option>
          <option value="2">2</option>

        </select>
        ', ' | ','

        <select name="Classe" id="Classe">
        <label for="Classe"></label>
          <option value="">Changer la classe</option>
          <option value="NULL">Aucune classe</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
        ', ' | ','

        <select name="Groupe" id="Groupe">
        <label for="Groupe"></label>
          <option value="">Changer le Groupe</option>
          <option value="NULL">Aucun Groupe</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
        ', ' | ','

        <input placeholder="Modifier le numéro de Tel" type="text" name="Tel" id="Tel"  >
        <label for="Tel"></label>


        <input type="date" name="born" id="born"  >
        <label for="born"></label>
        ', ' | ','

        <select name="Rang" id="Rang">
        <label for="Rang"></label>
          <option value="">Changer le Rang</option>
          <option value="NonAhderent">Non Adherent</option>
          <option value="Ahderent">Adherent</option>
          <option value="Moderateur">Moderateur</option>
          <option value="Admin">Admin</option>
        </select>

        <br />
       <button class="btn-submit" type="submit">Envoyer</button>

       </form>',

       '</li>';?>
       <br />
  <?php  } ?>
</ul></div>

<form class="" action="index.html" method="post">

</form>

</body>
</html>
