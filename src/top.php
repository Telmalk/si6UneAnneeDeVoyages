<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 24/05/2018
 * Time: 12:59
 */
require_once "./include/function.php";
require_once "./include/connection.php";

if (!isset($_GET['page']) || empty($_GET['page'])) {
    header("location: ./error.php?error=pagenotfound");
    exit;
}

if ($_GET['page'] !== "Gastronomie" && $_GET['page'] !== "Hebergement" && $_GET['page'] !== "Bien-être") {
    header("location: error.php?error=badcategory");
    exit;
}

$sql = "
     SELECT
        `id_carrousel`,
        `category`,
        `description`,
        `img`,
        `title`
    FROM
      `carrousel`
     ORDER BY id_carrousel 
    DESC LIMIT 0, 3;
";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$nbFind = 0;
getHeader();
?>

<section class="top-buttonSection">
    <div class="top-buttonBox">
        <a class="top-button <?=whoSelect("Bien-être")?>" href="top.php?page=Bien-être">BIEN-ÊTRE</a>
        <a class="top-button <?=whoSelect("Gastronomie")?>" href="top.php?page=Gastronomie">GASTRONOMIE</a>
        <a class="top-button <?=whoSelect("Hebergement")?>" href="top.php?page=Hebergement">HÉBERGEMENT</a>
        <div class="top-border"></div>
    </div>
</section>

<section class="top-article">
    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :
          if ($row['category'] === $_GET['page']) : ?>
    <div class="top-item">
        <!-- <div class="top-nb"><p>1</p></div> -->
        <div class="top-imgContainer">
            <a href="#"><img class="top-itemImg" src="img/fiche_technique/<?=$row['img']?>" alt="Photo de la fiche technique"></a>
        </div>
        <div class="top-itemInfo">
            <div><a class="top-itemTitle" href="fiche.php?id=<?=$row['id_carrousel']?>"><?=$row['title']?></a></div>
            <div class="top-itemTxt"><a class="top-itemTxtLink" href="fiche.php?id=<?=$row['id_carrousel']?>"><?=nl2br($row['description'])?> </a></div>
            <div><a class="top-itemSeemore" href="fiche.php?id=<?=$row['id_carrousel']?>">VOIR PLUS</a></div>
        </div>
    </div>
    <?php
          $nbFind++;
        endif;
        endwhile;
        if ($nbFind < 100) :
            while ($nbFind < 100) : ?>
    <div class="top-item <?php if ($nbFind > 10) {
        echo "hidden";
    }?>">
        <div class="top-imgContainer">
            <a href="#"><img class="top-itemImg" src="img/lama.jpg" alt="Bah c'est un Lama"></a>
        </div>
        <div class="top-itemInfo">
            <div><a class="top-itemTitle" href="#">Type something</a></div>
            <div class="top-itemTxt"><a class="top-itemTxtLink" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a></div>
            <div><a class="top-itemSeemore" href="#">VOIR PLUS</a></div>
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



