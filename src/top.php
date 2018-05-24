<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 24/05/2018
 * Time: 12:59
 */
require_once "./include/connection.php";

if (!isset($_GET['page']) || empty($_GET['page'])) {
    header("location: ./error.php?error=pagenotfound");
    exit;
}

if ($_GET['page'] !== "Gastronomie" && $_GET['page'] !== "Hebergement" && $_GET['page'] !== "Bien etre") {
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
      `carrousel`;
";
$stmt = $pdo->prepare($sql);
$stmt->execute();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tops</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
<header>
    <div class="top-background">
        <img class="logo" src="img/logo.png" />
        <nav class="navbar">
            <div class="navbar-toggle">
                <img class="navbar-toggle-burger" src="img/menu.svg" />
            </div>
            <ul class="navbar-ul">
                <li class="navbar-ul-li"><a href="#">Abonnement</a></li>
                <li class="navbar-ul-li"><a href="#">Fiches pratiques</a></li>
                <li class="navbar-ul-li"><a href="#">À propos</a></li>
                <li class="navbar-ul-li"><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="hide">
            <div class="modal">
                <div class="modal-overlay"></div>
                <ul class="modal-content">
                    <li class="modal-content-li"><a href="#">Abonnement</a></li>
                    <li class="modal-content-li"><a href="#">Fiches pratiques</a></li>
                    <li class="modal-content-li"><a href="#">À propos</a></li>
                    <li class="modal-content-li"><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<section class="top-buttonSection">
    <div class="top-buttonBox">
        <a class="top-button btn-active" href="#">BIEN-ÊTRE</a>
        <a class="top-button" href="top.php?page=Gastronomie">GASTRONOMIE</a>
        <a class="top-button" href="top.php?page=Hebergement">HÉBERGEMENT</a>
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
            <a class="top-itemTitle" href="fiche.php?id=<?=$row['id_carrousel']?>"><?=$row['title']?></a>
            <a class="top-itemTxt" href="fiche.php?id=<?=$row['id_carrousel']?>"><?=nl2br($row['description'])?> </a>
            <a class="top-itemSeemore" href="fiche.php?id=<?=$row['id_carrousel']?>">VOIR PLUS</a>
        </div>
    </div>
    <?php
        endif;
        endwhile;
    ?>

    <!-- <div class="top-item">
        <div class="top-imgContainer">
            <a href="#"><img class="top-itemImg" src="img/lama.jpg" alt="Bah c'est un Lama"></a>
        </div>
        <div class="top-itemInfo">
            <a class="top-itemTitle" href="#">Type something</a>
            <a class="top-itemTxt" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a>
            <a class="top-itemSeemore" href="#">VOIR PLUS</a>
        </div>
    </div>

    <div class="top-item">
        <div class="top-imgContainer">
            <a href="#"><img class="top-itemImg" src="img/lama.jpg" alt="Bah c'est un Lama"></a>
        </div>
        <div class="top-itemInfo">
            <a class="top-itemTitle" href="#">Type something</a>
            <a class="top-itemTxt" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a>
            <a class="top-itemSeemore" href="#">VOIR PLUS</a>
        </div>
    </div>

    <div class="top-item">
        <div class="top-imgContainer">
            <a href="#"><img class="top-itemImg" src="img/lama.jpg" alt="Bah c'est un Lama"></a>
        </div>
        <div class="top-itemInfo">
            <a class="top-itemTitle" href="#">Type something</a>
            <a class="top-itemTxt" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a>
            <a class="top-itemSeemore" href="#">VOIR PLUS</a>
        </div>
    </div>
    -->

    <div class="top-seeMore">
        <a class="top-seeMoreLink" href="#">VOIR PLUS</a>
    </div>
</section>

</body>

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

</html>

