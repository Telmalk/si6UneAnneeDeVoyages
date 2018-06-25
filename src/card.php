<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 25/05/2018
 * Time: 00:16
 */

require_once "./include/connection.php";
require_once "./include/function.php";
getHeader("fiche technique");

$sql = "
SELECT
    `id_carrousel`,
    `img`,
    `title`,
    `category`
FROM
  `carrousel`;
";

$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
    <div class="categ">
        <a class="categ-lien <?=whoSelect("all")?>" href="./card.php?page=all">tout</a>
        <a class="categ-lien <?=whoSelect("Bien-être")?>" href="./card.php?page=Bien-être">bien être</a>
        <a class="categ-lien <?=whoSelect("Gastronomie")?>" href="./card.php?page=Gastronomie">gastronomie</a>
        <a class="categ-lien <?=whoSelect("Hebergement")?>" href="./card.php?page=Hebergement">hébergement</a>
        <a class="categ-lien <?=whoSelect("Culture")?>" href="./card.php?page=Culture">culture</a>
        <a class="categ-lien <?=whoSelect("Sport")?>" href="./card.php?page=Sport">sport</a>
    </div>
    <section class="container">
        <?php
        if ($_GET['page'] == "all") :
            while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="container-fiche">
            <img class="container-fiche-img" src="./img/fiche_technique/<?=$row['img']?>">
            <div class="container-fiche-title">
                <a href="./cardDetails.php?id=<?=$row['id_carrousel']?>"><?=$row['title']?></a>
            </div>
        </div>
            <?php
            endwhile;
            else :
                while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                    if($_GET['page'] === $row['category']) : ?>
                        <div class="container-fiche">
                            <img class="container-fiche-img" src="./img/fiche_technique/<?=$row['img']?>">
                            <div class="container-fiche-title">
                                <a href="./cardDetails.php?id=<?=$row['id_carrousel']?>"><?=$row['title']?></a>
                            </div>
                        </div>
                        </a>
                        <?php
                            endif;
                            endwhile;
                            endif;
                        ?>

                </section>
<div class="seemore">
    <a class="seemore-link" href="#">voir plus</a>
</div>
<?php
    getFooter();