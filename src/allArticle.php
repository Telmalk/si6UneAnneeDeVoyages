<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 24/05/2018
 * Time: 18:28
 */

require_once "./include/connection.php";
require_once "./include/function.php";

getHeader("Tous les articles");

$sql = "SELECT
        `id_article`,
        `title`,
        `content`,
        `img`
    FROM
      `articles`
     ORDER BY id_article
     LIMIT 0,100;
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header("location: error.php");
    exit;
}
?>

<section class="top-article">
    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="top-item">
                <div class="top-imgContainer">
                    <div class="top-nb"><p><?=$nbFind?></p></div>
                    <a href="article.php?id=<?=$row['id_article']?>""><img class="top-itemImg" src="img/fiche_technique/<?=$row['img']?>" alt="Photo de la fiche technique"></a>
                </div>
                <div class="top-itemInfo">
                    <div><a class="top-itemTitle" href="article.php?id=<?=$row['id_article']?>"><?=$row['title']?></a></div>
                    <div class="top-itemTxt"><a class="top-itemTxtLink" href="article.php?id=<?=$row['id_article']?>"><?=nl2br($row['description'])?> </a></div>
                    <div><a class="top-itemSeemore" href="article.php?id=<?=$row['id_article']?>">VOIR PLUS</a></div>
                </div>
            </div>
            <?php
            $nbFind++;
    endwhile;
    if ($nbFind <= 110) :
        while ($nbFind <= 110) : ?>
            <div class="top-item <?php if ($nbFind > 10) {
                echo "hidden";
            }?>">
                <div class="top-imgContainer">
                    <div class="top-nb"><p><?=$nbFind?></p></div>
                    <a href="#"><img class="top-itemImg" src="img/lama.jpg" alt="Bah c'est un Lama"></a>
                </div>
                <div class="top-itemInfo">
                    <div><a class="top-itemTitle" href="#">Type something</a></div>
                    <div class="top-itemTxt"><a class="top-itemTxtLink" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a></div>
                    <a class="top-itemSeemore" href="#">VOIR PLUS</a>
                </div>
            </div>
            <?php
            $nbFind++;
        endwhile;
    endif;
    ?>

    <div class="top-seeMore">
        <span class="top-seeMoreLink" href="#">VOIR PLUS</span>
    </div>
</section>
<?php
    getFooter();

