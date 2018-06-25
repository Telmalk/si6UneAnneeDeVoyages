<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:01
 */
function getHeader($title)
{
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>

    <body>
    <header>
        <div class="top-background">
            <a href="./index.php"><img class="logo" src="img/logo.png" /></a>
            <nav class="navbar">
                <div class="navbar-toggle">
                    <img class="navbar-toggle-burger" src="img/menu.svg" />
                </div>
                <ul class="navbar-ul">
                    <li class="navbar-ul-li"><a href="./subscribe.php">Abonnement</a></li>
                    <li class="navbar-ul-li"><a href="./top.php?page=Bien-être">Notre Sélection</a></li>
                    <li class="navbar-ul-li"><a href="./card.php?page=all">Fiches pratiques</a></li>
                    <li class="navbar-ul-li"><a href="./allArticle.php">Articles</a></li>
                    <li class="navbar-ul-li"><a href="./index.php#formContact">Contact</a></li>
                    <li class="navbar-ul-li"><a href="./abouus.php">À propos</a></li>
                </ul>
            </nav>
            <div class="hide">
                <div class="modal">
                    <div class="modal-overlay"></div>
                    <ul class="modal-content">
                        <li class="modal-content-li"><a href="./subscribe.php">Abonnement</a></li>
                        <li class="modal-content-li"><a href="./top.php?page=Bien-être">Notre Sélection</a></li>
                        <li class="modal-content-li"><a href="./card.php?page=all">Fiches pratiques</a></li>
                        <li class="modal-content-li"><a href="./allArticle.php">Articles</a></li>
                        <li class="modal-content-li"><a href="/index.php#formContact">Contact</a></li>
                        <li class="modal-content-li"><a href="/abouus.php">À propos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <style>
            .hidden {
                display: none;
            }
        </style>

    </header>
<?php
}

function whoSelect(string $compare)
{
    if ($compare === $_GET['page']) {
        return "btn-active";
    }
    return "";
}

function getContentHome()
{

}

function getFooter()
{
    ?>
    <footer class="footer">
        <div class="footer-left">
            <a href="./index.php"><img class="footer-left-logo" src="img/logo.png"/></a>
            <p>
                Tous droits réservés Une Année De Voyages 2018
            </p>
        </div>
        <div class="footer-right">
            <div class="footer-right-col">
                <p class="footer-right-col-title">annonceurs</p>
                <ul>
                    <li><a href="#">Offices de Tourisme</a></li>
                    <li><a href="#">Voyagistes</a></li>
                    <li><a href="#">Compagnies aériennes</a></li>
                    <li><a href="#">Transports</a></li>
                    <li><a href="#">Luxe, style et voyage</a></li>
                    <li><a href="#">Hôtellerie, restauration, hébergement</a></li>
                    <li><a href="#">Croisières, spa, thalasso</a></li>
                    <li><a href="#">Facilitateurs de voyage</a></li>
                </ul>
            </div>
            <div class="footer-right-col">
                <p class="footer-right-col-title">compagnies</p>
                <ul>
                    <li><a href="#">Actualités</a></li>
                    <li><a href="#">Star Alliance</a></li>
                    <li><a href="#">SkyTeam</a></li>
                    <li><a href="#">OneWorld</a></li>
                </ul>
            </div>
            <div class="footer-right-col">
                <p class="footer-right-col-title">a propos</p>
                <ul>
                    <li><a href="#">Concept</a></li>
                    <li><a href="#">Notre équipe</a></li>
                    <li><a href="#">Abonnement</a></li>
                </ul>
            </div>
        </div>

    </footer>

    <script type="text/javascript">
        var menuImg = document.querySelector('.navbar-toggle-burger');
        var modal = document.querySelector('.modal');
        var modalOverlay = document.querySelector('.modal-overlay');
        menuImg.addEventListener('click', function() {
            console.log("toto");
            modal.classList.add('activeModal');
            modalOverlay.style.display = "block";
        });
        modalOverlay.addEventListener('click', function() {
            modal.classList.remove('activeModal');
            modalOverlay.style.display = "none";
        });
    </script>
    <script>
        var dis = document.querySelectorAll(".top-item");
        var but = document.querySelector(".top-seeMore");
        var button = document.querySelectorAll(".top-seeMoreLink");
        let i  = 10;
        but.addEventListener("click", function(){
            if (i < 100) {
                let y = i - 10;
                while (y < i) {
                    dis[y].classList.remove('hidden');
                    y++;
                }
                i += 10;
            } else {
                button.innerHTML = "Plus rien a afficher";
            }

        });
    </script>
    </body>
    </html>
<?php
}