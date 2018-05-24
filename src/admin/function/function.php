<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:12
 */


function checkUser(string $signWay)
{
    if (!isset($_SESSION['log'])) {
        if ($_SESSION['user']['name'] === NULL || $_SESSION["user"]["name"] === NULL) {
            header("location: ".$signWay);
            exit;
        }
        header("location: ".$signWay);
        exit;
    }
}
function getHeader(string $way)
{
    ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>toto</title>
    <link href="<?=$way?>bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?=$way?>bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
    <nav class="container nav" style="margin-bottom: 50px;">
        <a class="nav-item" href="<?=$way?>abort.php"><button class="btn btn-danger">Déconnexion</button></a>
        <a class="nav-item" href="<?=$way?>article/showArticle.php"><button class="btn btn-success"><strong>Gerer les articles</strong></button></a>
        <a class="nav-item" href="<?=$way?>partner/showPartner.php"><button class="btn btn-success"><strong>Gerer les partenaires</strong></button></a>
        <a class="nav-item" href="<?=$way?>caroussel/showCompany.php"><button class="btn btn-success"><strong>Gerer les activitées</strong></button></a><br/>
    </nav>

    <?php
}

function getContentAdmin(PDO $pdo)
{
    $sql = "
        SELECT
  `id_article`,
  `title`,
  `img`,
  `content`,
  `spawnDate`,
  `id_user`
  FROM
  `articles`;

    ";
    $checkNbArticles = 0;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    ?>
    <table>
        <tr>
            <td><a href="article/addArticle.php">ajouter un article</a></td>
        </tr>
            <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td>article n°: <?=$row['id_article']?></td>
                    <td><?=$row["title"]?></td>
                    <td><a href="article/update.php?id=<?=$row["id_article"]?>">Modifier</a></td>
                    <td><a href="article/delete.php?id=<?=$row['id_article']?>">Suprimmer</a></td>
                </tr>
    <?php
            $checkNbArticles++;
        endwhile;
        if ($checkNbArticles === 0) {
            ?>
                <p>Aucun article à afficher</p>
            <?php
        }
    ?>
        </table>
        <a href="./partner/showPartner.php">Liste des partenaires</a>
        <a href="./caroussel/showCompany.php">List des etablissement proposé</a>
    <?php
}

function formAddArticle()
{
    date_default_timezone_set('UTC');
    $today = date('d.m.y');
    ?>
    <div class="container">
        <a style="margin-bottom: 20px;" class="btn btn-primary" href="./showArticle.php">Retour a la liste des articles</a>
    <form method="post" action="doadd.php" enctype="multipart/form-data">
        <label>Le titre de l'article<input type="text" name="title"></label> <br/>
        <label>Lien de l'image<input type="file" name="img"></label><br/>
        <label> Type de l'activité
            <select name="category">
                <option>Bien être</option>
                <option>Gastronomie</option>
                <option>Sport</option>
                <option>Hebergement</option>
                <option>Culture</option>
            </select>
        </label><br/>
        <label>Contenu<textarea name="content"></textarea></label><br/>
        <input type="hidden" value="<?=$today?>" name="today">
        <button class="btn btn-success" type="submit">Valider</button>
    </form>
    </div>
    <?php
}

function formSignIn()
{
    if (!isset($_SESSION['log'])) {
        ?>
        <form method="post" action="dosignin.php" class="container">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Valider</button>
        </form>
        <?php
    } else {
        header("location: ../index.php");
    }
}

/**
 * @param PDO $pdo
 * @param array $session
 * @return void
 */
function doSignIn(PDO $pdo)
{
    $sql = "
        SELECT
            `id_user`,
            `username`,
            `password`
        FROM
          `user`
        WHERE
          username = :username
        AND
          password = :password
        ;
";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $_POST['username']);
    $stmt->bindValue(":password", $_POST["password"]);
    $stmt->execute();
    if ($nbFind = $stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $_SESSION['log'] = true;
        $_SESSION['user']['name'] = $row['username'];
        $_SESSION['user']['id'] = $row['id_user'];
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
        var_dump($_SESSION);
    } else {
        $_SESSION["error"]["log"] = "Mauvais modt de passe ou nom d'utilisateur";
        header("location: ./signin.php?error=erroraccount");
        exit;
    }
    header("location: ./index.php");
    exit;
}

function confirmDelete(PDO $pdo)
{
    $sql = "
        SELECT
            `title`
        FROM
          articles
        WHERE
          `id_article` = :id_article;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id_article", $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        header("location: ./showArticle.php?error=deleteeroor");
        exit;
    }
    ?>
    <div class="container">
    <a class="btn btn-primary" href="../index.php">Retour a la home</a>
    <form method="post" action="./dodelete.php?id=<?=$_GET['id']?>">
        <p>Etes vous sur de vouloir suprimmer l'article <?=$row['title']?></p>
        <button class="btn-success" type="submit">Oui</button>
    </form>
    </div>
    <?php
}

function doDelete(PDO $pdo)
{
    $sql = "
        DELETE FROM `articles`
        WHERE 
        `id_article` = :id_article;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id_article", $_GET['id']);
    $stmt->execute();
    header("location: ./showArticle.php");
    exit;
}

function formUpdate(PDO $pdo)
{
    $sql = "
        SELECT
          `title`,
          `img`,
          `content`
        FROM
          `articles`
        WHERE
          `id_article` = :id_article;
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id_article", $_GET["id"]);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        header("location: ./index.php?error=nodatatoedit");
        exit;
    }
    ?>
    <div class="container">
    <a style="margin-bottom: 20px;" class="btn btn-primary" href="./showArticle.php">Retour a la home</a>
    <form method="post" action="doupdate.php?id=<?=$_GET['id']?>&amp;img=<?=$row['img']?>" enctype="multipart/form-data">
        <label>Modifier le titre <input type="text" name="title" value="<?=$row["title"]?>"></label> <br/>
        <label>Modifier l'image <input type="file" name="img"></label> <br/>
        <label>Modifier le contenu <textarea name="content"><?=$row["content"]?></textarea></label> <br/>
        <button class="btn btn-success" type="submit">Valider</button>
    </form>
    </div>
    <?php
}

function doUpdate(PDO $pdo)
{
    $sql = "
        UPDATE `articles`
        SET
        `title` = :title,
        `img` = :img,
        `content` = :content
        WHERE
        `id_article` = :id_article
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":title" , $_POST['title']);
    $stmt->bindValue(":content" , $_POST['content']);
    $stmt->bindValue(":id_article", $_GET["id"]);
    if (!empty($_FILES['img']['name']) && $_FILES['img']['name'] !== $_GET['img']) {
        unlink("../../img/articles/" . $_GET['img']);
        saveFile("../../img/articles/", "img");
        $stmt->bindValue(":img", htmlentities($_FILES["img"]['name']));
    } else {
        $stmt->bindValue(":img", htmlentities($_GET['img']));
    }
    $stmt->execute();
    header("location: ./showArticle.php");
    exit;
}

function showListPartner(PDO $pdo)
{
    $sql = "
    SELECT
        id_partner,
        name,
        logo,
        categorie
    FROM
      partner;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $nbFind = 0;
    ?>
    <div class="container">
        <a href="add.php"><button class="btn btn-primary">Ajouter un partenaire</button></a>
        <a href="../index.php"><button class="btn btn-default">Retour a la home</button></a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">type</th>
                <th scope="col">Modifier</th>
                <th scope="col">Suprimmer</th>
            </tr>
            </thead>
            <tbody>
    <?php
    $nbElem = 1;
    while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <th scope="row"><?=$row['id_partner']?></th>
            <td><?=$row['name']?></td>
            <td><?=$row['categorie']?></td>
            <td><a href="update.php?id=<?=$row['id_partner']?>">Modifer</a></td>
            <td><a href="delete.php?id=<?=$row['id_partner']?>">Suprimmer</a></td>
        </tr>
        <?php
            $nbFind++;
            endwhile;
            if ($nbFind === 0) : ?>
                <p>Aucun partenaire pour l'instant</p>
                <?php
            endif;
            ?>
    </div>
    <?php
}

function formPartner()
{
    ?>
    <div class="container">
    <a style="margin-bottom: 20px;" class="btn btn-primary" href="./showPartner.php">Retour a la liste des partenaire</a>
    <form method="post" action="doadd.php" enctype="multipart/form-data">
        <label>Nom du partenaire : <input type="text" name="name"></label> <br />
        <label>Logo du partenaire : <input type="file" name="logo"></label> <br />
        <label>Type de partenaire:
            <select name="category">
                <option value="spa">spa</option>
                <option value="hotel">hotel</option>
                <option value="Compagnie aerienne">Compagnie aerienne</option>
                <option value="Restaurant">Restaurant</option>
            </select>
        </label> <br/>
        <button type="submit">Valider</button>
    </form>
    </div>
    <?php
}

function addPartner(PDO $pdo)
{
    $sql = "
    INSERT INTO `partner`
    SET
      `name` = :dname,
      `logo` = :logo,
      `categorie` = :categorie;
    ";


    if (saveFile("../../img/partenaire/", "logo") != 0) {
        header("location: ./showPartner.php?error=noimgtomove");
        exit;
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":dname", $_POST['name']);
    $stmt->bindValue(':logo', $_FILES['logo']['name']);
    $stmt->bindValue(':categorie',  $_POST['category']);
    $stmt->execute();
    header("location: ./showPartner.php");
}

function confrimDeletePartner(PDO $pdo)
{
    $sql = "
        SELECT
            `id_partner`,
            `name`
        FROM
          `partner`
        WHERE
          id_partner = :id;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        header("location: ./showPartner.php?error=nodatatoedit");
        $_SESSION['error']["delete"] = "Rien a effacer";
    } else  {
        if (isset($_SESSION["error"]["delete"])) {
            unset($_SESSION["error"]["delete"]);
        }
        ?>
        <div class="container">
        <a style="margin-bottom: 20px;" class="btn btn-primary" href="./showPartner.php">Retour a la liste des partenaire</a>
        <p>Etes vous sur de vouloir suprimmer le partenaire <?=$row['name']?></p>
            <a class="btn btn-success" href="./dodelete.php?id=<?=$row['id_partner']?>">Oui</a>
            <button class="btn btn-danger">Non</button>
        </div>
    <?php

    }

}

function doDeletePartner(PDO $pdo)
{
    $sql = "
        SELECT
          `logo`
        FROM
          `partner`
        WHERE
        `id_partner` = :id;
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        header('location: ./showPartner?=error=nodatatodelete');
        exit;
    }

    unlink("../../img/".$row['logo']);
    $sql = "
        DELETE FROM `partner`
        WHERE
        `id_partner` = :id;
     ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET['id']);
    $stmt->execute();
    header("location: ./showPartner.php");
}

function whoSelected(string $whatCategory, array $categoryArray)
{
    $optionArray = [];
    $index = 0;
    while ($index < sizeof($categoryArray)) {
        if ($categoryArray[$index] == $whatCategory) {
            $option = "<option selected value='$whatCategory'> $whatCategory</option>";
            array_push($optionArray, $option);
        } else {
            $option = "<option value='$categoryArray[$index]'>$categoryArray[$index]</option>";
            array_push($optionArray, $option);
        }
        $index++;
    }
    return $optionArray;
}

function formUpdatePartner(PDO $pdo)
{
    $sql = "
   SELECT
      `id_partner`,
      `name`,
      `logo`,
      `categorie`
    FROM
      `partner`
    WHERE
      `id_partner` = :id;
";
    $categoryArray = ["Spa", "Hotel", "Compagnie aerienne", "Restaurant"];
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        $_SESSION["error"]["data"] = "une erreur est survenu";
        header('location: ./showPartner.php?error=nodatatoedit');
        exit;
    }
    $optionArray = whoSelected($row["categorie"], $categoryArray);
    ?>
    <div class="container">
    <a style="margin-bottom: 20px;" class="btn btn-primary" href="./showPartner.php">Retour a la liste des partenaire</a>
    <form method="post" action="doupdate.php?id=<?=$row['id_partner']?>&amp;img=<?=$row["logo"]?>" enctype="multipart/form-data">
        <label>Entreprise partenaire: <input type="text" name="name" value="<?=$row['name']?>"></label> <br/>
        <label>Logo partneaire url: <input type="file" name="logo"></label><br/>
        <label>
            <select name="category">
            <?php
                $index = 0;
                while ($index < sizeof($optionArray)) {
                    echo $optionArray[$index];
                    $index++;
                }
            ?>
            </select>
        </label><br/>
        <button class="btn btn-success" type="submit">Valider</button>
    </form>
    </div>
    <?php
}

function saveFile($way, $imgName) {
    $move = move_uploaded_file($_FILES[$imgName]['tmp_name'], $way . $_FILES[$imgName]['name']);
    if   ($move === false) {
        return -1;
    }
    return 0;
}

function deleteFile(array $name, $way, $nameToDekete)
{
    $fileDelete = unlink($way.$name[$nameToDekete]);
    if ($fileDelete === false) {
        return -1;
    }
    return 0;
}

function getFooter()
{
?>
</body>
</html>
<?php
}