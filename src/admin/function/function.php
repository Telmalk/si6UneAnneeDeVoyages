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
function getHeader()
{
    ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>toto</title>
</head>
<body>
    <a href="../abort.php">deco</a>
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
    <form method="post" action="doadd.php">
        <label>Le titre de l'article<input type="text" name="title"></label> <br/>
        <label>Lien de l'image<input type="text" name="img"></label><br/>
        <label>Contenu<input type="text" name="content"></label><br/>
        <input type="hidden" value="<?=$today?>" name="today">
        <button type="submit">Valider</button>
    </form>
    <?php
}

function formSignIn()
{
    if (!isset($_SESSION['log'])) {
        ?>
        <form method="post" action="dosignin.php">
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
    header("location: ../index.php");
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
        header("location?error=deleteeroor");
        exit;
    }
    ?>
    <a href="../index.php">Retour a la home</a>
    <form method="post" action="./dodelete.php?id=<?=$_GET['id']?>">
        <p>Etes vous sur de vouloir suprimmer l'article <?=$row['title']?></p>
        <button type="submit">Oui</button>
    </form>
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
    header("location: ../index.php");
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
    <a href="../index.php">Retour a la home</a>
    <form method="post" action="doupdate.php?id=<?=$_GET['id']?>">
        <label>Modifier le titre <input type="text" name="title" value="<?=$row["title"]?>"></label>
        <label>Modifier le titre <input type="text" name="img" value="<?=$row["img"]?>"></label>
        <label>Modifier le titre <input type="text" name="content" value="<?=$row["content"]?>"></label>
        <button type="submit">Valider</button>
    </form>
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
    $stmt->bindValue(":img" , $_POST['img']);
    $stmt->bindValue(":content" , $_POST['content']);
    $stmt->bindValue(":id_article", $_GET["id"]);
    $stmt->execute();
    header("location: ../index.php");
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
    <a href="add.php">Ajouter un partenaire</a>
    <?php
    while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <p>partenaire: <?=$row['name']?> type: <?=$row['categorie']?> <a href="update.php?id=<?=$row['id_partner']?>">Modifer</a> <a href="delete.php?id=<?=$row['id_partner']?>">Suprimmer</a></p>
        <?php
            $nbFind++;
            endwhile;
            if ($nbFind === 0) : ?>
                <p>Aucun partenaire pour l'instant</p>
                <?php
            endif;
            ?>
    <a href="../index.php">Retour a la home</a>
    <?php
}

function formPartner()
{
    ?>
    <a href="./showPartner.php">Retour a la liste des partenaire</a>
    <form method="post" action="doadd.php">
        <label>Nom du partenaire : <input type="text" name="name"></label>
        <label>Logo du partenaire : <input type="text" name="logo"></label>
        <label>Type de partenaire:
            <select name="category">
                <option value="spa">spa</option>
                <option value="hotel">hotel</option>
                <option value="Compagnie aerienne">Compagnie aerienne</option>
                <option value="Restaurant">Restaurant</option>
            </select>
        </label>
        <button type="submit">Valider</button>
    </form>
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
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":dname", $_POST['name']);
    $stmt->bindValue(':logo', $_POST['logo']);
    $stmt->bindValue(':categorie', $_POST['category']);
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
        <a href="./showPartner.php">Retour a la liste des partenaire</a>
        <p>Etes vous sur de vouloir suprimmer le partenaire <?=$row['name']?></p>
        <form method="post" action="dodelete.php?id=<?=$row['id_partner']?>">
            <button type="submit">Oui</button>
        </form>
    <?php

    }

}

function doDeletePartner(PDO $pdo)
{
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
    <a href="./showPartner.php">Retour a la liste des partenaire</a>
    <form method="post" action="doupdate.php?id=<?=$row['id_partner']?>">
        <label>Entreprise partenaire: <input type="text" name="name" value="<?=$row['name']?>"></label>
        <label>Logo partneaire url: <input type="text" name="logo" value="<?=$row['logo']?>"></label>
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
        </label>
        <button type="submit">Valider</button>
    </form>
    <?php
}

function saveFile() {
    $move = move_uploaded_file($_FILES['img']['tmp_name'], "../../img/".$_FILES["img"]['name']);
    if ($move === false) {
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