<?php
session_start();
include 'Connecbdd.php';

if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {


  $Req_Info_User = $pdo->prepare('SELECT * from personne Where IdAdherent=?');    //
  $Req_Info_User->execute(array($_SESSION['IdAdherent']));                        //  récupération des informations de l'utilisateur
  $Info_User = $Req_Info_User->fetch();                                           //
}

$Req_Info_Topic = $pdo->prepare('SELECT * from Topic ORDER BY dateOuverture ASC');    //
$Req_Info_Topic->execute();                                                        //  récupération de tout les topics
//$Info_Topic = $Req_Info_Info->fetch();                                            //

$Req_Topic_User_Create = $pdo->prepare('SELECT Nom, Prenom FROM Personne Where IdAdherent = ?');  //Récupération de qui a créé le Topic
//$Req_Topic_User_Create->execute(array($Info_Topic['IdAdherent']));

$Req_Nb_Topic = $pdo->prepare('SELECT Count(*) from Topic ');    //
$Nb_Topic = $Req_Nb_Topic->execute();                                         //  récupération du nombre de topics
//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Main-CSS/style_forum.css"/>
    <link rel="stylesheet" href="../Main-CSS/style.css"/>
</head>

<body>
    <header>
        <img src="../Image/LogoETIQ.png" class="logoETIQ">
        <h1 id="mainTitle">Etiq</h1><p id="descMainTitle">IUT informatique Dijon</p>
        <nav class="headerAccueil">
            <ul>
                <li class="deroulante"><a href="../accueil.html" class="menu">Accueil</a></li>
                <li class="deroulante"><a href="Forum.php" class="menu">Forum</a>

                </li>

                <li><a>Etiq ▼</a>
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

        <div class="menuForum">

            <div class="titremenu">
                <a href="forum.php" class="titrelien">Forum</a>
            </div>
        </div>

        <div class="menuDiscussion">

            <h3 class="titreDiscussion">Créations Topics</h3>

            <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { ?>                                    <!--                                 -->
                                                                                                                              <!--                                 -->
                        <form action="InsérerTopic.php" method="get" accept-charset="utf-8">                                  <!--                                 -->
                          <div class="floating-label">                                                                        <!--                                 -->
                                                                                                                              <!--                                 -->
                              <input class="menuEcriture" placeholder="Nom du Topic" type="text" name="NomTopic"  required>   <!--                                 -->
                                                                                                                              <!-- Formulaire pour créer une Topic -->
                                                                                                                              <!--                                 -->
                          </div>                                                                                              <!--                                 -->
                            <button class="Envoyer" type="submit">Envoyer</button>                                            <!--                                 -->
                          </form>                                                                                             <!--                                 -->
                                                                                                                              <!--                                 -->
            <?php }else {                                                                                                     //                                   //
              echo "Vous ne pouvez pas créer de Topic (Non Connecté)";                                                        //                                   //
            } ?>

        </div>

        <div class="menuTopic">
            <h2 class="titreTopic">Liste des topics</h2>

            <?php if ($Nb_Topic == 0) { echo '<div class="Topic"> <p>Aucun sujet</p> </div>';}
                        else {
                          while ($Info_Topic = $Req_Info_Topic->fetch()) {
                            ?>
                            <p>
                              <?php echo '<div class="Topic"> <a href="lire_sujet.php?IdTopic=', $Info_Topic['IdTopic'], '">', $Info_Topic['NomTopic'], '</a>'; //Afficache des Topics

                                $Req_Topic_User_Create->execute(array($Info_Topic['IdAdherent']));
                                $Topic_User_Create = $Req_Topic_User_Create->fetch();
                                echo '<Br/>';
                                echo " Créé par : ", $Topic_User_Create['Nom'], " ", $Topic_User_Create['Prenom']; //Affichage le nom et le Prénom du créateur

                                $date = explode("-", $Info_Topic['dateOuverture']); //Décomposition de la date
                                echo " le : ", $date[2], "/", $date[1], "/", $date[0]; //Affichage de la date

                              ?>
                            </p> </div>
                            <?php
                          }
                        } ?>

        </div>
    </div>
</body>
</html>
