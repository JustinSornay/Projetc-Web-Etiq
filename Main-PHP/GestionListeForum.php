<?php
session_start();
include 'Connecbdd.php';

$Req_Info_Topic = $pdo->prepare('SELECT * from Topic ORDER BY dateOuverture ASC');    //
$Req_Info_Topic->execute();                                                          //  récupération de tout les topics


$Req_Topic_User_Create = $pdo->prepare('SELECT Nom, Prenom FROM Personne Where IdAdherent = ?');  //Récupération de qui a créé le Topic


$Req_Nb_Topic = $pdo->prepare('SELECT Count(*) from Topic ');
$Nb_Topic = $Req_Nb_Topic->execute();                                         //  récupération du nombre de topics



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Administration</title>
  <link rel="stylesheet" href="../Main-CSS/style.css"/>
  <link rel="stylesheet" href="../Main-CSS/style_GestionListeForum.css"/>
</head>

<body>
<header>
    <img src="../Image/LogoETIQ.png" class="logoETIQ" alt="logo etiq">
    <h1 id="mainTitle">Etiq</h1><p id="descMainTitle">IUT informatique Dijon</p>
    <nav class="headerAccueil">
        <ul>
            <li class="deroulante"><a href="accueil.php" class="menu">Accueil</a></li>

            <li class="deroulante"><a href="administration.php" class="menu">Administration</a>

            </li>
        </ul>
    </nav>
</header>

  <h2>Liste des topics</h2>

  <?php if ($Nb_Topic == 0) { echo '<div class="Topic"> <p>Aucun sujet</p> </div>';}
              else {
                while ($Info_Topic = $Req_Info_Topic->fetch()) {
                  ?>
                  <p>
                    <?php echo '<span> <div class="InfoTopic"> <a style="color: orange" href="GestionForum.php?IdTopic=', $Info_Topic['IdTopic'], '">', $Info_Topic['NomTopic'], '</a>'; //Afficache des Topics
                      echo "    |    ";
                      echo '<a style="color: orange" href="modifTopic.php?IdTopic=', $Info_Topic['IdTopic'], '">', 'Supprimer</a>';
                      $Req_Topic_User_Create->execute(array($Info_Topic['IdAdherent']));
                      $Topic_User_Create = $Req_Topic_User_Create->fetch();
                      echo '<Br/>';
                      echo " Créé par : ", $Topic_User_Create['Nom'], " ", $Topic_User_Create['Prenom']; //Affichage le nom et le Prénom du créateur

                      $date = explode("-", $Info_Topic['dateOuverture']); //Décomposition de la date
                      echo " le : ", $date[2], "/", $date[1], "/", $date[0]; //Affichage de la date
                    ?>

											<?php
											$Topic = $Info_Topic['IdTopic'];
											$req_Nb_Message = $pdo->prepare('SELECT Count(IdPoste) as total from Topic natural join postemess where IdTopic= :IdTopic ');
											$req_Nb_Message->bindValue(':IdTopic', $Topic, PDO::PARAM_INT);

 												$req_Nb_Message->execute();
												$Nb_Message = $req_Nb_Message->fetch();

											$req_Nb_Participant = $pdo->prepare('SELECT (Count(Distinct IdAdherent)) as total from postemess where IdTopic= :IdTopic');
											$req_Nb_Participant->bindValue(':IdTopic', $Topic, PDO::PARAM_INT);

												$req_Nb_Participant->execute();
												$Nb_Participant = $req_Nb_Participant->fetch();

												// $Req_Nb_Message = $pdo->query('SELECT Count(IdPoste) as total from Topic natural join postemess where IdTopic=? ');
												//$Req_Nb_Message->bindValue(':IdTopic', $Topic, PDO::PARAM_INT);
										    // $Nb_Message = $Req_Nb_Message->fetch($Info_Topic['IdTopic']);
										    // $Req_Nb_Message->closeCursor();
												echo '<br />';
												echo "Nombre de Messages : ", $Nb_Message['total'];
												echo '<br />';
												echo "Nombre de Participants : ", $Nb_Participant['total'];
											?>

                    </form>
                  </p> </div> </span>
                  <?php
                }
              } ?>

</body>
</html>
