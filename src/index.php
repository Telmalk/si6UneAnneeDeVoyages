<?php

    require_once 'include/connection.php';
    require_once 'include/function.php';

    $sql = "
    SELECT
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
<div class="background">
    <header>
        <a href="./index.php"><img class="logo" src="img/logo.png" /></a>
        <nav class="navbar">
            <div class="navbar-toggle">
                <img class="navbar-toggle-burger" src="img/menu.svg" />
            </div>
            <ul class="navbar-ul">
                <li class="navbar-ul-li"><a href="./subscribe.php">Abonnement</a></li>
                <li class="navbar-ul-li"><a href="top.php?page=Bien-être">Notre Sélection</a></li>
                <li class="navbar-ul-li"><a href="./card.php?page=all">Fiches pratiques</a></li>
                <li class="navbar-ul-li"><a href="./allArticle.php">Articles</a></li>
                <li class="navbar-ul-li"><a href="#formContact">Contact</a></li>
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
    </header>
    <section class="text">
        <div class="text-bloc">
            <h1 class="text-bloc-title">Une année de voyages</h1>
            <p class="text-bloc-desc">
                Des voyages testés ... </br> Des idées pour partir toute l'année !
            </p>
        </div>
        <div class="text-social">
            <a class="text-social-link" href="#"><img class="text-social-link-icon" src="img/twitter.svg"/></a>
            <a class="text-social-link" href="#"><img class="text-social-link-icon" src="img/instagram.svg"/></a>
            <a class="text-social-link" href="#"><img class="text-social-link-icon" src="img/facebook.svg"/></a>
            <a class="text-social-link" href="#"><img class="text-social-link-icon" src="img/youtube.svg"/></a>
        </div>

    </section>
</div>
<section class="fourcards">
    <div class="fourcards-card">
        <div class="centerImg">
            <img class="fourcards-card-img" src="img/logo-mook.svg" />
        </div>
        <h3 class="fourcards-card-title">Un Mook Collector</h3>
        <p class="fourcards-card-desc">
            "Un mook (contraction de magazine et book) est un ouvrage hybride dont le format se situe entre le magazine et le livre. Il est publié de manière périodique et renferme essentiellement de grands reportages. Il comprend également des dessins et des photos
            servant à l’illustration des textes."
        </p>
    </div>
    <div class="fourcards-card">
        <div class="centerImg">
            <img class="fourcards-card-img" src="img/logo-fiche.svg" />
        </div>
        <h3 class="fourcards-card-title">Des fiches pratiques</h3>
        <p class="fourcards-card-desc">
            Minutieusement détaillées, elles vous disent tout du voyage décrit nos articles : Hôtels, restaurants, boutiques, musée, shopping, The Place to be et aussi quelle est la meilleure compagnie aérienne pour rejoindre par exemple San Francisco, quelles sont
            les meilleures dates, …
        </p>
    </div>
    <div class="fourcards-card">
        <div class="centerImg">
            <img class="fourcards-card-img" src="img/logo-mobile.svg" />
        </div>
        <h3 class="fourcards-card-title">Une appli mobile</h3>
        <p class="fourcards-card-desc">
            Qui supprime l'obsolescence du print... Rien que ça ! Une Année De Voyages est un mook print qui vit simultanément à l’ère du numérique... C'est sur l'application que nos fiches pratiques seront updatées et téléchargeables ! Ainsi Une Année De Voyages
            devient une sorte de "bible »…
        </p>
    </div>
    <div class="fourcards-card">
        <div class="centerImg">
            <img class="fourcards-card-img" src="img/logo-computer.svg" />
        </div>
        <h3 class="fourcards-card-title">Un site web</h3>
        <p class="fourcards-card-desc">
            Présentation des numéros en cours et archivés
            <br>Achat en ligne des numéros déjà parus et de l’actuel
            <br>Accès à tous les articles avant leur parution dans le prochain mook via Premium
            <br>Les bons plans aériens
            <br>Les Tops 100 : restaurants, hôtels, spas
        </p>
    </div>
</section>

<section class="green-section">
    <div class="green-box">
        <p class="green-number">11</p>
        <p class="green-txt1">Reporters-Photographes</p>
        <p class="green-number">130</p>
        <p class="green-txt2">Destinations</p>
        <p class="green-number">4211</p>
        <p class="green-txt3">Photographies</p>
        <p class="green-number">12.000</p>
        <p class="green-txt4">Pages imprimées</p>
    </div>
</section>

<section class="twitterActu-section">
    <div class="twitterActu">
        <p class="twitterTitle">Actu des compagnies aériennes</p>

        <div class="tweet-box">
            <div class="tweet1">
                <blockquote class="twitter-tweet" data-cards="hidden" data-lang="fr"><p lang="en" dir="ltr">oneworld® is the best alliance for on-time flights, according to leading airline industry data agency FlightGlobal, which today honoured oneworld with its Airline Alliance On-Time Performance Service (OPS) Award for 2017 - for the fifth year running.  <a href="https://t.co/xUJAiOoPzu">https://t.co/xUJAiOoPzu</a> <a href="https://t.co/pnFVxbLGR7">pic.twitter.com/pnFVxbLGR7</a></p>&mdash; oneworld Alliance (@traveloneworld) <a href="https://twitter.com/traveloneworld/status/950802049565896705?ref_src=twsrc%5Etfw">9 janvier 2018</a></blockquote>

                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


            </div>
            <div class="tweet2">
                <blockquote class="twitter-tweet" data-lang="fr"><p lang="en" dir="ltr"><a href="https://twitter.com/hashtag/AustrianAirlines?src=hash&amp;ref_src=twsrc%5Etfw">#AustrianAirlines</a> now flies from <a href="https://twitter.com/hashtag/Vienna?src=hash&amp;ref_src=twsrc%5Etfw">#Vienna</a> to <a href="https://twitter.com/hashtag/Tokyo?src=hash&amp;ref_src=twsrc%5Etfw">#Tokyo</a> five times a week. Congrats, <a href="https://twitter.com/_austrian?ref_src=twsrc%5Etfw">@_austrian</a>! 🇦🇹 ✈️ 🇯🇵 <a href="https://twitter.com/hashtag/Servus?src=hash&amp;ref_src=twsrc%5Etfw">#Servus</a> <a href="https://twitter.com/hashtag/StarAlliance?src=hash&amp;ref_src=twsrc%5Etfw">#StarAlliance</a> <a href="https://twitter.com/hashtag/NetworkNews?src=hash&amp;ref_src=twsrc%5Etfw">#NetworkNews</a> <a href="https://t.co/kqcY9AMcLj">https://t.co/kqcY9AMcLj</a></p>&mdash; Star Alliance (@staralliance) <a href="https://twitter.com/staralliance/status/999597307984269312?ref_src=twsrc%5Etfw">24 mai 2018</a></blockquote>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


            </div>
            <div class="tweet3">
                <blockquote class="twitter-tweet" data-cards="hidden" data-lang="fr"><p lang="en" dir="ltr">[SkyTeam Insights] From <a href="https://twitter.com/hashtag/anniversaries?src=hash&amp;ref_src=twsrc%5Etfw">#anniversaries</a> to new <a href="https://twitter.com/hashtag/aircraft?src=hash&amp;ref_src=twsrc%5Etfw">#aircraft</a> to new international routes, the <a href="https://twitter.com/hashtag/SkyTeam?src=hash&amp;ref_src=twsrc%5Etfw">#SkyTeam</a> network has a few special liveries in the air recently. Have you spotted any of these yet? <a href="https://t.co/uC3bS8LY8A">https://t.co/uC3bS8LY8A</a> <a href="https://twitter.com/hashtag/livery?src=hash&amp;ref_src=twsrc%5Etfw">#livery</a> <a href="https://twitter.com/hashtag/speciallivery?src=hash&amp;ref_src=twsrc%5Etfw">#speciallivery</a> <a href="https://twitter.com/hashtag/airplanelivery?src=hash&amp;ref_src=twsrc%5Etfw">#airplanelivery</a> <a href="https://twitter.com/hashtag/avgeeks?src=hash&amp;ref_src=twsrc%5Etfw">#avgeeks</a> <a href="https://twitter.com/hashtag/SkyTeamInsights?src=hash&amp;ref_src=twsrc%5Etfw">#SkyTeamInsights</a></p>&mdash; SkyTeam (@skyteam) <a href="https://twitter.com/skyteam/status/998876101341532160?ref_src=twsrc%5Etfw">22 mai 2018</a></blockquote>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


            </div>
        </div>
        <section class="savoirplus-section">
            <div class="twitter-savoirplus">
                <a href="#" class="twitterLink">En savoir plus <i class="fas fa-plus"></i></a>
            </div>
        </section>
    </div>
</section>

<section class="lastArticles-section">
    <div class="lastArticles-titleBox">
        <p class="lastArticles-title">Derniers articles</p>
    </div>
    <div class="lastArticles-articlebox">
        <?php
            while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="article1">
            <a class="lastArticles-articlelink" href="article.php?id=<?=$row['id_article']?>">
                <img src="img/articles/<?=$row['img']?>" alt="" class="lastArticles-img">
                <br><p class="lastArticles-articleTitle"><?=$row['title']?></p>
            </a>
            <p class="lastArticles-categories"><?=$row['category']?></p>
        </div>
                <?php
                    endwhile;
                ?>
</section>
<section class="bot">
    <div class="bot-contact">
        <h3 class="bot-contact-title">Contact</h3>
        <div class="bot-contact-box">
            <div class="centerImgFooter">
                <img class="bot-contact-box-img" src="img/map.svg" />
            </div>
            <p class="bot-contact-box-p"> 32, rue des Peupliers </br> 92100 Boulogne

            </p>
        </div>
        <div class="bot-contact-box">
            <div class="centerImgFooter">
                <img class="bot-contact-box-img" src="img/tel.svg" />
            </div>
            <p class="bot-contact-box-p">+33(0) 413 10 513</p>
        </div>
        <div class="bot-contact-box">
            <div class="centerImgFooter">
                <img class="bot-contact-box-img" src="img/mail.svg" />
            </div>
            <p class="bot-contact-box-p">rédaction@uneanneedevoyages.com</p>
        </div>
        <div class="bot-contact-horaire">
            <p>
                Ouvert du lundi au vendredi</br>de 10h à 18h
            </p>
        </div>
        <div class="bot-contact-social">
            <a href="#" class="bot-contact-social-link"><img class="bot-contact-social-link-icon" src="img/twitter.svg"/></a>
            <a href="#" class="bot-contact-social-link"><img class="bot-contact-social-link-icon" src="img/facebook.svg"/></a>
            <a href="#" class="bot-contact-social-link"><img class="bot-contact-social-link-icon" src="img/instagram.svg"/></a>
            <a href="#" class="bot-contact-social-link"><img class="bot-contact-social-link-icon" src="img/youtube.svg"/></a>
        </div>
    </div>
    <div id="formContact" class="bot-msg">
        <h3 class="bot-msg-title">Envoyez nous un message</h3>
        <form>

            <div class="bot-msg-type">
                <p class="bot-msg-type-title">Vous êtes</p>
                <div class="flexdir">
                    <div class="bot-msg-type-row">
                        <p>
                            <input name="youare" value="Journaliste" type="radio" /><label>Journaliste</label>
                            <input name="youare" value="Annonceur" type="radio" /><label>Annonceur</label>
                            <input name="youare" value="Lecteur" type="radio" /><label>Lecteur</label>
                    </div>
                    <div class="bot-msg-type-row">
                        <input name="youare" value="Partenaire" type="radio" /><label>Partenaire</label>
                        <input name="youare" value="Office de tourisme" type="radio" /><label>Office de tourisme</label>
                    </div>
                </div>
            </div>
            <div class="bot-msg-fields">
                <div class="bot-msg-fields-info">
                    <div class="flexdir">
                        <label>société</label>
                        <input type="text" />
                        <label>mail</label>
                        <input type="email" />
                    </div>
                </div>
                <div class="bot-msg-fields-info">
                    <div class="flexdir">
                        <label> nom</label>
                        <input type="text" />
                        <label>téléphone</label>
                        <input type="tel" />
                    </div>
                </div>
                <div class="bot-msg-fields-textarea flexdir">
                    <label>message</label>
                    <textarea></textarea>
                </div>
                <a class="send" href="#"><img src="img/send.svg"/></a>
            </div>
        </form>
    </div>
</section>
<?php
    $sql = "
    SELECT
        `logo`
    FROM
      `partner`;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
<section class="partenaire">
    <?php
    while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <div class="partenaire-div">
        <img src="img/partenaire/<?=$row['logo']?>"/>
    </div>
        <?php
            endwhile;
        ?>
    <!-- <div class="partenaire-div">
        <img src="img/oneworld.png"/>
    </div>
    <div class="partenaire-div">
        <img src="img/fujifilm.png"/>
    </div>
    <div class="partenaire-div">
        <img src="img/skyteam.png"/>
    </div>
    <div class="partenaire-div">
        <img src="img/paris.png"/>
    </div>
    -->
</section>
<?php
    getFooter();