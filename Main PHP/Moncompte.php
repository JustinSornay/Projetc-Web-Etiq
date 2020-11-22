<?php
session_start();
include 'Connecbdd.php';  //Connection a la bdd

if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) { //si l'user c'est connecté


  $Req_Info_User = $pdo->prepare('SELECT * from personne Where IdAdherent=?'); 
  $Req_Info_User->execute(array($_SESSION['IdAdherent']));  //exécute la requete ou l'identifier est $_SESSION['IdDdhérent']
  $Info_User = $Req_Info_User->fetch(); //stocke les infos de la requete ou l'identifier est $_SESSION['IdDdhérent'] dans $Info_User
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Main CSS/style_compte.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="deroulante"><a href="accueil.html">Accueil</a>
                    <ul class="sous">
                        <li><a href="Accueil.html" type="nav" alt="Accueil"> Accueil</a></li>
                        <li><a href="Contact.html" type="nav" alt="Nous contacter">Nous contacter</a></li>
                        <li><a href="Forum.php" type="nav" alt="Forum"> Forum</a></li>
                    </ul>
                </li>
                <li class="deroulante"><a href="moncompte.php">MonCompte</a>
                <ul class="sous">
                    <li><a href="Forum.php">Forum</a></li>
                    <li><a href="Adhésion.html">Adhésion</a></li>
                </ul>
                </li>
                <li><a href="Avantages.html">Avantages</a></li>
                <li><a href="Evenement.html">évenement</a></li>
            </ul>
        </nav><br><br><br><br>
    </header>
    <p>Bonjour <?php echo $Info_User['Prenom']; ?></p>
    <a href="deconnexion.php"><input type="button" value="Déconnexion"></a>
</body>
</html>
