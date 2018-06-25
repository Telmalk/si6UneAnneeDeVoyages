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
  `title`,
  `spawnDate`,
  `content`
FROM 
articles
WHERE
`id_article` = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header("location: error.php");
    exit;
}
getHeader("article");

$date = substr($row['spawnDate'], 2);

?>

<section class="article-ariane">
    <ul class="article-list">
        <li class="article-listItem"><a class="article-listItemLink" href="./index.php">Accueil</a></li>
        <li class="article-listItem"><a class="article-listItemLink" href="./allArticle.php">Articles</a></li>
        <li class="article-listItem"><a class="article-listItemLinkcurrent" href="./allArticle.php?page=<?="tot"?>">Hébergement</a></li>
    </ul>
</section>

<section class="article-box">
    <h1 class="article-title"><?=$row['title']?></h1>
    <p class="article-date">Le <?=$date?></p>
    <a class="article-fichepratique" href="#"><img class="article-ficheimg" src="img/fichepratique.png" alt="Accès à la fiche pratique"></a>
    <a class="article-twitter" href="#"><img src="img/twittergrey.svg" alt="Twitter"></a>
    <a class="article-facebook" href="#"><img src="img/fbgrey.svg" alt="Facebook"></a>
    <a class="article-instagram" href="#"><img src="img/instagramgrey.svg" alt="Instagram"></a>
    <a class="article-youtube" href="#"><img src="img/youtubegrey.svg" alt="Youtube"></a>


    <p class="article-txt">
        <?=nl2br($row["content"])?>
    </p>

</section>

<?php
$sql = "SELECT
     `id_article`,
     `title`,
     `category`,
     `img`
    FROM articles
    ORDER BY id_article 
    DESC LIMIT 0, 3;
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<section class="lastArticles-section articleMargin">
    <div class="lastArticles-articlebox">
        <?php
            while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="article1">
            <a class="lastArticles-articlelink" href="./article.php?id=<?=$row['id_article']?>">
                <img src="img/articles/<?=$row['img']?>" alt="" class="lastArticles-img">
                <br><p class="lastArticles-articleTitle"><?=$row['title']?></p>
            </a>
            <p class="lastArticles-categories">bien-être</p>
        </div>
                <?php
                    endwhile;
                ?>

       <!-- <div class="article2">
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
        </div> -->
    </div>
</section>
<?php
    getFooter();
