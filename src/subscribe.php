<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 25/05/2018
 * Time: 04:47
 */

require_once "./include/connection.php";
require_once "./include/function.php";

getHeader("Abonnement");
?>

<section class="subscribe">
    <div class="subscribe-mook">
        <h1 class="subscribe-title">2018</h1>
        <h3 class="subscribe-textTitle">Le numéro de l'année !</h3>
        <img class="subscribe-book" src="img/mook.png" alt="">
        <div class="subscribe-buttonContainer">
            <button class="subscribe-button" type="button" name="button">VOIR LES ANCIENS NUMÉROS</button>
        </div>
        <div class="subscribe-textContainer">
            <p class="subscribe-text">"Un mook (contraction de magazine et book) est un ouvrage hybride dont le format se situe entre le magazine et le livre. Il est publié de manière périodique et renferme essentiellement de grands reportages. Il comprend également des dessins et des photos servant à l’illustration des textes."</p>
        </div>
        <div class="subscribe-list">
            <li class="subscribe-listItems">- Un mook annuel à collectionner grâce à sa couverture illustrée, œuvre d'un artiste</li>
            <li class="subscribe-listItems">- Des goddies : 5 dessins originaux issus des "illustrateurs voyageurs" de la communauté internationale Urban Sketchers</li>
            <li class="subscribe-listItems">-	300 pages de reportages sous forme de "carnets de voyages"</li>
            <li class="subscribe-listItems">-	Des destinations testées et approuvées par nos journalistes (pas de mauvaise surprise à l'arrivée !)</li>
            <li class="subscribe-listItems">- 40.000 exemplaires vendus en kiosques, librairies et sur notre site</li>
        </div>
    </div>
    <div class="subscribe-prenium">
        <h2 class="subscribe-preniumTitle">Prenium</h2>
        <h3 class="subscribe-preniumTextTitle">S'abonner</h3>
        <div class="subscribe-preniumBlockContainer">
            <div class="subscribe-preniumBlockItems">
                <p class="subscribe-preniumBlocknNb">1</p>
            </div>
            <div class="subscribe-preniumBlockItems2">
                <p class="subscribe-preniumBlocknNb2">2</p>
            </div>
            <div class="subscribe-preniumBlockItems2">
                <p class="subscribe-preniumBlocknNb2">3</p>
            </div>
        </div>
        <div class="subscribe-preniumStepContainer">
            <div class="subscribe-preniumStep">
                <p class="subscribe-preniumText">COORDONNÉES</p>
            </div>
            <div class="subscribe-preniumStep">
                <p class="subscribe-preniumText2">RÉCAPITULATIF</p>
            </div>
            <div class="subscribe-preniumStep">
                <p class="subscribe-preniumText2">PAIEMENT</p>
            </div>
        </div>
        <div class="subscribe-preniumLine"></div>
    </div>
    <div class="subscribe-preniumForm">
        <p class="subscribe-preniumFormStatus">VOUS ÊTES</p>
        <div class="subscribe-preniumRadioContainer">
            <div class="subscribe-preniumRadio">
                <input name="status" value="Journaliste" type="radio" /><label>Journaliste</label>
                <input name="status" value="Annonceur" type="radio" /><label>Annonceur</label>
                <input name="status" value="Lecteur" type="radio" /><label>Lecteur</label>
                <input name="status" value="Partenaire" type="radio" /><label>Partenaire</label>
                <input name="status" value="Office de tourisme" type="radio" /><label>Office de tourisme</label>
            </div>
        </div>
    </div>
    </div>

</section>
<?php
getFooter();