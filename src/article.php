<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 24/05/2018
 * Time: 18:15
 */

require_once "./include/connection.php";
require_once "./include/function.php";

$sql = "
SELECT
  `id_article`,
  `title`,
  `category`,
  `img`
FROM 
articles;
";
getHeader();

?>

<section class="article-ariane">
    <ul class="article-list">
        <li class="article-listItem"><a class="article-listItemLink" href="./index.php">Page d'accueil</a></li>
        <li class="article-listItem"><a class="article-listItemLink" href="./allArticle.php">Articles</a></li>
        <li class="article-listItem"><a class="article-listItemLinkcurrent" href="./allArticle.php?page=<?="tot"?>">Hébergement</a></li>
    </ul>
</section>

<section class="article-box">
    <h1 class="article-title">Les bruits du silence</h1>
    <p class="article-date">Le 12/05/2018</p>
    <a class="article-fichepratique" href="#"><img src="img/fichepratique.png" alt="Accès à la fiche pratique"></a>
    <a class="article-twitter" href="#"><img src="img/twittergrey.svg" alt="Twitter"></a>
    <a class="article-facebook" href="#"><img src="img/fbgrey.svg" alt="Facebook"></a>
    <a class="article-instagram" href="#"><img src="img/instagramgrey.svg" alt="Instagram"></a>
    <a class="article-youtube" href="#"><img src="img/youtubegrey.svg" alt="Youtube"></a>


    <p class="article-txt">Ah… cette fameuse photo qui nous fait souvent rêver quand on la voit sur Instagram. Mais si, vous savez, cette cabane perdue dans une immense forêt que l’on contemple en se répétant secrètement qu’on rêverait d’y passer quelques jours histoire de
        se déconnecter. Eh bien, ce petit havre de paix, nous y avons goûté en nous rendant au Canada et plus particulièrement au Québec.<br><br>Pour cette nouvelle expérience, nous étions accompagnés d’Arnaud Montagard, un des photographes Français dont
        j’admire le travail, j’adore notamment ses portraits réalisés à New York et plus précisément sa série « across the window ».<br><br>Pour la petite histoire, 3 ans auparavant, j’avais revu mes amis Québécois de longue date lors de notre voyage à
        Montréal. Nous avions parlé de nos différents projets à venir et déjà à l’époque, nous réfléchissions au concept de la série #Disconnect.<br><br>Mon amie m’avait alors parlé de son oncle « Pierre », un homme d’une cinquantaine d’années travaillant
        dans le business de l’énergie à grande échelle qui avait une manière unique de se déconnecter en se rendant dans sa cabane en bois au cœur d’une immense forêt. Il abandonnait ainsi son quotidien stressant durant plusieurs semaines pour vivre en
        totale autarcie. <br><br>Elle me racontait également la passion de Pierre pour dame nature et son mépris grandissant pour certains acteurs de l’industrie alimentaire actuelle. Tous ces scandales autour de la maltraitance des animaux dans les abattoirs
        mêlés à l’élevage intensif qui oublie trop souvent l’éthique pour le profit, avaient fini par le dégoûter.<br><br>Depuis, Pierre ne mange que la viande qu’il chasse durant sa déconnexion… S’il ne croise pas d’animal, il n’en mange pas.
    </p>
    <div class="article-button">
        <button class="article-buttonItem" type="button" name="button">Suivant</button>
        <button class="article-buttonItem" type="button" name="button">Précédent</button>
    </div>
</section>

<section class="lastArticles-section">
    <div class="lastArticles-articlebox">
        <div class="article1">
            <a class="lastArticles-articlelink" href="">
                <img src="img/article1.png" alt="" class="lastArticles-img">
                <br><p class="lastArticles-articleTitle">Le blue Lagoon islandais, un spa à ciel ouvert</p>
            </a>
            <p class="lastArticles-categories">bien-être</p>
        </div>

        <div class="article2">
            <a class="lastArticles-articlelink" href="">
                <img src="img/article2.png" alt="" class="lastArticles-img">
                <br><p class="lastArticles-articleTitle">Le blue Lagoon islandais, un spa à ciel ouvert</p>
            </a>
            <p class="lastArticles-categories">gastronomie</p>
        </div>

        <div class="article3">
            <a class="lastArticles-articlelink" href="">
                <img src="img/article3.png" alt="" class="lastArticles-img">
                <br><p class="lastArticles-articleTitle">Le blue Lagoon islandais, un spa à ciel ouvert</p>
            </a>
            <p class="lastArticles-categories">hébergement</p>
        </div>
    </div>
</section>
<?php
    getFooter();
