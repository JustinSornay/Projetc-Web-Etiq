<?php
session_start();
include 'Connecbdd.php';

 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Main-CSS/style_accueil.css"/>
    <link rel="stylesheet" href="../Main-CSS/style.css"/>
    <title>Site web de l'ETIQ</title>

</head>

<body>

    <header>
        <img src="../Image/LogoETIQ.png" class="logoETIQ" alt="logo etiq">
        <h1 id="mainTitle">Etiq</h1><p id="descMainTitle">IUT informatique Dijon</p>
        <nav class="headerAccueil">
            <ul>
                <li class="deroulante"><a href="accueil.php" class="menu">Accueil</a></li>

                <li class="deroulante"><a href="Forum.php" class="menu">Forum</a>

                </li>

                <li><a  class="menu">Etiq ▼</a>
                    <ul class="sous">
                        <li><a href="../Evenement.html" class="menu">Evenement</a></li>
                        <li><a href="../Contact.html" class="menu">Contact</a></li>
                        <li><a href="../Avantages.html" class="menu">Avantage</a></li>
                    </ul>
                </li>

                <?php if (isset($_SESSION['IdAdherent']) AND $_SESSION['IdAdherent'] > 0) {
                  echo ' <li><a href="deconnexion.php" class="menu">Se déconnecter ▼</a><ul class="sous">
                      <li><a href="Myaccounte.php" class="menu">Mon Compte</a></li>
                  </ul></li>';
                }else {
                echo  ' <li><a href="../Login.html" class="menu">Se connecter ▼</a><ul class="sous">
                      <li><a href="Myaccounte.php" class="menu">Mon Compte</a></li>
                  </ul></li>';
                } ?>

            </ul>
        </nav>
    </header>
    <div id="carrouselle" >
        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext"></div>
              <img src="../Image/picture1.jpg" style="width:100%">
              <div class="text"></div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext"></div>
              <img src="../Image/picture2.png" style="width:100%">
              <div class="text"></div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext"></div>
              <img src="../Image/picture3.jpg" style="width:100%">
              <div class="text"></div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
            </div>
    </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="corpsPage">
        <div class="bandeDroite">
            <div class="divSommaire">
                <h3 class="titre">Sommaire</h3>
                <ol>
                    <li><a class="mainElementSommaire" href="#I">Qu'est-ce que l'ETIQ?</a></li>
                    <div class="sousPartieSommaire">
                        <li><a class="elementSommaire" href="#I.1">Qu'est-ce que l'on fait?</a></li>
                        <li><a class="elementSommaire" href="#I.2">A quoi sert cette association?</a></li>
                        <li><a class="elementSommaire" href="#I.3">Comment devenir membre?</a></li>
                    </div>

                    <li><a class="mainElementSommaire" href ="#II">Les avantages de l'association</a></li>
                    <div class="sousPartieSommaire">
                        <li><a class="elementSommaire" href="#II.1">Aide à la vie étudiante</a></li>
                        <li><a class="elementSommaire" href="#II.2">Action valorisante pour le diplôme</a></li>
                    </div>
                </ol>
            </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="divActu">
            <h3 class="titre2">Actualité</h3>
                <div class='elementActu'>
                    <h4>Evénement</h4>
                    <ul>
                        <li>Quizz manga disponible sur le <a href="https://www.facebook.com/events/1408499879347369/" class="actualité">Facebook</a> de l'ETIQ. Article publié le 9 juillet 2020.</li><br>
                        <li>Nouvelle vidéo disponible sur <a href="https://www.youtube.com/watch?v=qBWjHo-Krdc&feature=share&fbclid=IwAR0qYf65WIiA8bqTUjavO81upVOpzC7tCBkbdX6u55LHFPJ8XDnAM8jx6zI" class="actualité">Youtube</a>, la voix du renard épisode 7.</li>
                    </ul>
                </div>

                <div class='elementActu'>
                    <h4>Avantages</h4>
                    <ul>
                        <li>Adhérer à l'association de l'ETIQ offre de nombreux avantages pour plus d'informations cliquer <a href="../Avantages.html" class="actualité">ici</a></li>
                    </ul>
                </div>

                <div class='elementActu'>
                    <h4>Forum</h4>
                    <ul>
                        <li>Vous avez des questions par rapport à l'association? N'hésitez pas à aller faire un tour sur notre <a href="forum.php" class="actualité">Forum</a>.</li><br>
                        <li>Vous avez besoin d'aide pour réaliser un travail en particulier? Vous trouverez sûrement de l'aide <a href="forum.php" class="actualité">ici</a>.</li>
                    </ul>
                </div>
        </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

            <img src="../Image/affiche.jpg" class="planning" alt="image background Team Etiq">
        </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="bandeGauche">
        <div class="Presentation">
            <div class="sousPresentation">
                    <h2 class="TitrePresentation">Présentation de l'association de l'ETIQ</h2>
                    <h3 id="I">Qu'est-ce que l'ETIQ?</h3>
                    <p>
                        L’ETIQ est une association créée depuis de nombreuses années (1983) par les étudiants, et pour les étudiants.
                        Une salle leur est consacrée. C’est un espace de détente où les étudiants qui se sont inscrits peuvent acheter des boissons,
                        de la nourriture, jouer à des jeux de société ou bien encore s’amuser sur des consoles mises à disposition.
                        L’ETIQ est donc l’association étudiante de l’IUT de Dijon.
                        <br>
                        Elle réunit les différents étudiants et anciens étudiants de la promotion IUT Informatique.
                        Elle comporte des locaux au sein de l’IUT au premier étage. Vous pourrez y passer du temps : il y a des canapés pour se poser,
                        des consoles de jeux, divers jeux de société comme les échecs par exemple !
                    </p>
                <div class="sousSousPresentation">
                    <div class="textePresentation">
                        <h4 id="I.1">Qu'est-ce que l'on fait?</h4>
                        <p>
                            Des évènements y sont régulièrement organisés, comme des sorties au cinéma par exemple ainsi que des soirées à thèmes.
                            C’est l’association qui gère la soirée d’intégration, à la rentrée.
                            Bien que certains évènements ne soient pas gratuits, la totalité de l’argent qui est générée par ces évènements est uniquement
                            réinvesti pour les futurs évènements ou concept de l’ETIQ.
                            <br>
                            Les membres de l’ETIQ organisent notamment des cours de soutien non obligatoire pour les premières années. La présence y est
                            inscrite. Cette liste est ensuite transmise à l’établissement et peut faire pencher la balance sur les prises de décisions des
                            enseignants pour les étudiants en difficultés pour qui il manque peu de points (0.5 points près) pour ne pas redoubler ou quitter
                            l’IUT.
                        </p>
                </div>

                    <div class="textePresentation">
                        <h4 id="I.2">A quoi sert cette association</h4>
                        <p> ETIQ souhaite favoriser la solidarité et l'entraide entre les anciens et nouveaux étudiants de l'IUT Informatique de Dijon.</p>
                    </div>

                    <div class="textePresentation">
                        <h4 id="I.3">Comment devenir membre</h4>
                        <p>L’inscription coute 5 euros par personne en plus de recevoir une première boisson gratuite. Cet argent sert à financer le matériel
                            mis à disposition des étudiants qui ont adhéré à l’ETIQ, mais aussi des évènements en tous genres qu’elle organise. Ces évènements
                            peuvent être des soirées, des avant-premières de films, des repas, des fêtes, des sorties comme des Laser Game, des courses
                            d’orientation, des barbecues, des concours, et plein d’autres évènements tout au long de l’année. Les jeudis après-midi
                            (remplace le mercredi au lycée) font souvent l’objet d’animation.
                            Pour plus d'informations cliquez <a class="actualité" href='../Register.html'>ici</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    <img src="../Image/membres.jpg" class="membre" alt="Image des membres de l'Etiq">

        <div class="Presentation2">
            <div class="sousPresentation">

                <h3 id="II">Les avantages de l'association</h3>

                <div class="sousSousPresentation">
                    <div class="textePresentation">
                        <h4 id="II.1">Aide à la vie étudiante</h4>
                        <p>
                            L'ETIQ vous offre la possibilité de vous aider dans votre cursus scolaire. Si vous avez des difficultés avec une matière et que vous êtes intéressé par le projet de tutorat, vous pouvez cliquer
                            <a class="actualité" href="../image/Last.pdf" download="Acme Documentation (ver. 2.0.1).jpg">ici</a>
                            pour télécharger
                            le document à rendre aux membres de l'association.</br></br>
                            Être membre d'une association est valorisant pour votre vie professionnelle future. En effet, le fait d'adhérer une association
                            va accentuer votre investissement ce qui sera très valorisateur auprès des entretiens d'embauche.
                        </p>
                    </div>

                    <div class="textePresentation">
                        <h4 id="II.2">Action valorisante pour le diplôme</h4>
                        <p>Devenir membre d'une association vous permettra de profiter du BONUS ETUDIANT. Ce bonus va vous permettre de gagner un pourcentage
                            compris entre 1 et 5 qui va venir s'appliquer à votre moyenne. Cela n'est pas à négliger surtout si vous avez des difficultés
                            avec l'apprentissage.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bandeFinPage">
            <a href="../Politique.html" class="elementBandeFinPage">Confidentialité</a>
            <a href="../MentionLegal.html" class="elementBandeFinPage">Mention légale</a>
        </div>
    </div>
    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
        </script>

</body>
</html>
