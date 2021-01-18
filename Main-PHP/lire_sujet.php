<?php
session_start();
include 'Connecbdd.php';

//$IdTopic = $_GET['IdTopic'];

//$sql = 'SELECT Message, IdPoste, HeurePoste FROM postemess WHERE IdTopic= $IdTopic';

$Req_Nom_Topic = $pdo->prepare('SELECT NomTopic FROM topic WHERE IdTopic= ?');
$Req_Nom_Topic->execute(array($_GET['IdTopic']));
$Nom_Topic =$Req_Nom_Topic->fetch();

$Req_Info_Topic_Mess = $pdo->prepare('SELECT * FROM postemess WHERE IdTopic= ? ORDER BY HeurePoste DESC');
$Req_Info_Topic_Mess->execute(array($_GET['IdTopic']));
//$Info_Topic = $Req_Info_Topic_Mess->fetch();

$Req_Mess_User_Create = $pdo->prepare('SELECT Nom, Prenom FROM Personne Where IdAdherent = ?');  //Récupération de qui a créé le Message
//$Req_Mess_User_Create->execute(array($Info_Topic['IdAdherent']));

$Req_NbParticipant_Topic = $pdo->prepare('SELECT DIstinct IdAdherent, nom, prenom FROM postemess NATURAL JOIN personne WHERE IdTopic= ? ORDER BY HeurePoste Desc');
$Req_NbParticipant_Topic->execute(array($_GET['IdTopic']));
//$Info_Topic = $Req_Info_Topic_Mess->fetch();


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum écrire</title>
    <link rel="stylesheet" href="../Main-CSS/style_forum.css"/>
    <link rel="stylesheet" href="../Main-CSS/style_forum_écrire.css"/>
    <link rel="stylesheet" href="../Main-CSS/style.css"/>
</head>
<body>
    <header>
        <img src="../Image/LogoETIQ.png" class="logoETIQ">
        <h1 id="mainTitle">Etiq</h1><p id="descMainTitle">IUT informatique Dijon</p>
        <nav class="headerAccueil">
            <ul>
                <li class="deroulante"><a href="accueil.php" class="menu">Accueil</a></li>

                <li class="deroulante"><a href="Forum.php" class="menu">Forum</a>

                </li>

                <li><a href="Accueil.php">Etiq ▼</a>
                    <ul class="sous">
                        <li><a href="../Evenement.html" class="menu">Evenement</a></li>
                        <li><a href="../Contact.html" class="menu">contacte</a></li>
                        <li><a href="../Avantages.html" class="menu">Avantages</a> </li>
                    </ul>
                </li>

                <li><a href="../Login.html" class="menu">Se connecter</a>
                    <ul class="sous">
                        <li><a href="Myaccounte.php" class="menu">Mon Compte</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

    </header>
    <div class="page">
        <div class="menuDiscussion">

            <h3 class="titreDiscussion"><?php echo $Nom_Topic['NomTopic']; ?></h3>

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
                </p>                                                                                                                                              <!--                                          -->
                <?php } ?>

                <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { ?>                                       <!--                                 -->
                                                                                                                                     <!--                                 -->
                  <?php echo '<form action="PosteMess.php?IdTopic=', $_GET['IdTopic'], '"  method="post">'; //Afficache des Topics ?><!--                                 -->
                <!--<form action="PosteMess.php" method="post"> -->                                                                  <!--                                 -->
                                                                                                                                     <!--                                 -->
                  <textarea name="Message" class="menuEcriture" cols="50" rows="1"></textarea>                                                           <!--                                 -->
                            <br />                                                                                                       <!--        Envoyer un message       -->
                  <button class="Envoyer" type="submit">Envoyer</button>                                                          <!--                                 -->
                                                                                                                                     <!--                                 -->
                </form>                                                                                                             <!--                                 -->
                                                                                                                                     <!--                                 -->
                <?php }else {                                                                                                        //                                   //
                  echo "Vous ne pouvez pas envoyer de message (Non Connecté)";                                                       //                                   //
                } ?>

        </div>

        <div class="menuTopic">
            <h2 class="titreTopic2">Listes des participants</h2>
           <ol>
             <?php while ($NbParticipant_Topic = $Req_NbParticipant_Topic->fetch()) {
               echo '<li class="participant1">', $NbParticipant_Topic['nom'], '-', $NbParticipant_Topic['prenom'], '</li>';
               //<li class=participant2>Participant 1</li>
             }?>
           </ol>
        </div>
    </div>

</body>
</html>
