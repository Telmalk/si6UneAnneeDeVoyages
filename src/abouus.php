<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 24/05/2018
 * Time: 22:05
 */

require_once "./include/connection.php";
require_once "./include/function.php";

getHeader();
?>

<section class="about">
    <div class="about-whiteRectangle">
        <h1 class="about-title">Soyez un voyageur averti !</h1>

        <div class="about-mookContainer">
            <div class="about-mook">
                <img class="about-mookImg" src="img/logo-mook.svg" alt="">
                <h3 class="about-mookTitle">Un Mook Collector</h3>
            </div>
            <div class="about-mookTextContainer">
                <p class="about-mookText">"Un mook (contraction de magazine et book) est un ouvrage hybride dont le format se situe entre le magazine et le livre. Il est publié de manière périodique et renferme essentiellement de grands reportages. Il comprend également des dessins
                    et des photos servant à l’illustration des textes."</p>
                <ul class="about-listContainer">
                    <li class="">- Un mook annuel à collectionner grâce à sa couverture illustrée, œuvre d'un artiste.</li>
                    <li class="">- Des goddies : 5 dessins originaux issus des "illustrateurs voyageurs" de la communauté internationale Urban Sketchers.</li>
                    <li class="">- 300 pages de reportages sous forme de "carnets de voyages ».</li>
                    <li class="">- Des destinations testées et approuvées par nos journalistes (pas de mauvaise surprise à l'arrivée !)</li>
                    <li class="">- 40.000 exemplaires vendus en kiosques, librairies et sur notre site.</li>
                    <li class="">- Des fiches pratiques d'exception et détachables.</li>
                    <li class="">- TV YouTube.</li>
                </ul>
            </div>
        </div>

        <div class="about-practicalContainer">
            <div class="about-practical">
                <img class="about-practicalImg" src="img/logo-fiche.svg" alt="">
                <h3 class="about-practicalTitle">Des Fiches Pratiques</h3>
            </div>
            <div class="about-practicalTextContainer">
                <p class="about-practicalText">"Minutieusement détaillées, elles vous disent tout du voyage décrit nos articles : Hôtels, restaurants, boutiques, musée, shopping, The Place to be et aussi quelle est la meilleure compagnie aérienne pour rejoindre par exemple San Francisco,
                    quelles sont les meilleures dates, comment aller à pied de Nob Hill au Golden Gate en passant par des ruelles remplies de street art méconnus du grand public, arriver pile à l'heure pour être dans l'axe du soleil sur le 3ème pilier et réussir
                    à coup sûr la photo du siècle tout en s'émerveillant de la beauté de la Bay... ça, c'est Une Année de Voyages !</p>
                <p class="about-practicalQR">Des QR Codes intégrés aux fiches pratiques pour offrir une vitrine extra-large à nos partenaires</p>
            </div>
        </div>

        <div class="about-applicationContainer">
            <div class="about-application">
                <img class="about-applicationImg" src="img/logo-mobile.svg" alt="">
                <h3 class="about-applicationTitle">Une appli mobile</h3>
            </div>
            <div class="about-applicationTextContainer">
                <p class="about-applicationText">
                    Qui supprime l'obsolescence du print... Rien que ça ! Une Année De Voyages est un mook print qui vit simultanément à l’ère du numérique... C'est sur l'application que nos fiches pratiques seront updatées et téléchargeables ! Ainsi Une Année De Voyages
                    devient une sorte de "bible" intemporelle des destinations avec des reportages bénéficiant d'une durée de vie illimitée... Le rêve !
                </p>
                <p class="about-applicationText2">Qui vous dit, sous forme d'un Quizz fun et personnalisé "Quel voyage êtes-vous ?" dont le résultat renvoie forcément à une destination qui correspond à un de nos articles.</p>
            </div>
        </div>

        <div class="about-WebContainer">
            <div class="about-Web">
                <img class="about-WebImg" src="img/logo-computer.svg" alt="">
                <h3 class="about-WebTitle">Un site internet</h3>
            </div>
            <div class="about-WebListContainer">
                <ul class="about-WebList">
                    <li class="">- Présentation des numéros en cours et archivés.</li>
                    <li class="">- La possibilité d'acheter en ligne les numéros déjà parus et l'actuel en cours.</li>
                    <li class="">- D’accéder via un abonnement Full Premium à tous les articles avant leur parution dans le prochain mook.</li>
                    <li class="">- Les bons plans aériens.</li>
                    <li class="">- Les Tops 100 : restaurants, hôtels, spas.</li>
                </ul>
            </div>
        </div>
        <div class="about-teamContainer">
            <h2 class="about-teamTitle">Notre équipe</h2>
            <div class="about-teamProfile">
                <div class="about-teamItems"><img class="about-teamImg" src="img/team1.png" alt="">
                    <p class="about-teamName">Judith Lossmann</p>
                    <div class="about-teamJob">
                        <p>Fondatrice</p>
                        <p>Rédatrice en chef</p>
                    </div>
                </div>

                <div class="about-teamItems"><img class="about-teamImg" src="img/team2.png" alt="">
                    <p class="about-teamName">Inma Serrano</p>
                    <div class="about-teamJob">
                        <p>Illustrarice</p>
                    </div>
                </div>

                <div class="about-teamItems"><img class="about-teamImg" src="img/team3.png" alt="">
                    <p class="about-teamName">Caroline M’zali</p>
                    <div class="about-teamJob">
                        <p>Pigiste</p>
                        <p>Secrétaire de rédaction</p>
                    </div>
                </div>

                <div class="about-teamItems"><img class="about-teamImg" src="img/team4.png" alt="">
                    <p class="about-teamName">Damien Dégremont</p>
                    <div class="about-teamJob">
                        <p>Développeur du site</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<?php
// getFooter();