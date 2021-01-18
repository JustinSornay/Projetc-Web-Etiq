<?php
session_start();
include 'Connecbdd.php';

$Req_Info_Topic_Mess = $pdo->prepare('SELECT * FROM postemess WHERE IdTopic= ? ORDER BY HeurePoste DESC');
$Req_Info_Topic_Mess->execute(array($_GET['IdTopic']));

$Req_Mess_User_Create = $pdo->prepare('SELECT Nom, Prenom FROM Personne Where IdAdherent = ?');  //Récupération de qui a créé le Message

$Req_Nom_Topic = $pdo->prepare('SELECT NomTopic from topic Where IdTopic = ?');
$Req_Nom_Topic->execute(array($_GET['IdTopic']));
$NomTopic = $Req_Nom_Topic->fetch();

$Req_NbParticipant_Topic = $pdo->prepare('SELECT DIstinct IdAdherent, nom, prenom FROM postemess NATURAL JOIN personne WHERE IdTopic= ? ORDER BY HeurePoste Desc');
$Req_NbParticipant_Topic->execute(array($_GET['IdTopic']));

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Administration</title>
  <link rel="stylesheet" href="../Main-CSS/style.css"/>
  <link rel="stylesheet" href="../Main-CSS/style_forum.css"/>
  <link rel="stylesheet" href="../Main-CSS/style_GestionForum.css"/>
</head>

<body>
<header>
    <img src="../Image/LogoETIQ.png" class="logoETIQ" alt="logo etiq">
    <h1 id="mainTitle">Etiq</h1><p id="descMainTitle">IUT informatique Dijon</p>
    <nav class="headerAccueil">
        <ul>
            <li class="deroulante"><a href="accueil.php" class="menu">Accueil</a></li>

            <li class="deroulante"><a href="administration.php" class="menu">Administration</a>
            <li class="deroulante"><a href="GestionListeForum.php" class="menu">GestionForum</a></li>

            </li>
        </ul>
    </nav>
</header>

    <div class="page">
        <div class="menuDiscussion">

            <h3 class="titreDiscussion"><?php echo $NomTopic['NomTopic']; ?></h3>

            <?php                                                                                                                                                 //                                            //
            while ($Info_Topic_Mess = $Req_Info_Topic_Mess->fetch()) {                                                                                            //                                            //
              ?><p>                                                                                                                                               <!--                                          -->
                <?php                                                                                                                                             //                                            //
                $Req_Mess_User_Create->execute(array($Info_Topic_Mess['IdAdherent']));                                                                            //                                            //
                $Mess_User_Create = $Req_Mess_User_Create->fetch();                                                                                               //                                            //
                echo " Ecrit par : ", $Mess_User_Create['Nom'], " ", $Mess_User_Create['Prenom']; //Affichage le nom et le Prénom de la personne qui a posté      //                                            //
                $dateTime = explode(" ", $Info_Topic_Mess['HeurePoste']); //Sépare la date de l'heure                                                             //      Affiche tout les messages a la suite  //
                $date = explode("-", $dateTime[0]); //Décomposition de la date                                                                                    //                                            //
                $Heure = explode(":", $dateTime[1]); //Décomposition de l'heure'                                                                                  //                                            //
                echo " le : ", $date[2], "/", $date[1], "/", $date[0]; //Affichage de la date                                                                     //                                            //
                echo  " à ", $Heure[0], ":", $Heure[1];                                                                                                           //                                            //
                echo " → ", $Info_Topic_Mess['Message'];                                                                                                          //                                            //
                 ?>                                                                                                                                               <!--                                          -->
                </p>
                <p>
                  <?php echo '<a class="Supprimer" href="modifMessage.php?IdPoste=', $Info_Topic_Mess['IdPoste'], '">', 'Supprimer</a>'; ?>
                </p>                                                                                                                                              <!--                                          -->
                <?php } ?>
        </div>
        <div class="menuTopic">
            <h2 class="titreTopic2">Listes des participants</h2>
           <ol>
             <?php while ($NbParticipant_Topic = $Req_NbParticipant_Topic->fetch()) {
               echo '<li class="participant1">', $NbParticipant_Topic['nom'], '-', $NbParticipant_Topic['prenom'], '</li>';
             }?>
           </ol>
        </div>
    </div>

</body>
</html>
