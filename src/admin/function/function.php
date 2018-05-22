<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:12
 */

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
    <a href="abort.php">deco</a>
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
            <td><a href="../addArticle.php">ajouter un article</a></td>
        </tr>
            <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td>article n°: <?=$row['id_article']?></td>
                    <td><?=$row["title"]?></td>
                    <td><a href="../update.php?id=<?=$row["id_article"]?>">Modifier</a></td>
                    <td><a href="../delete.php?id=<?=$row['id_article']?>">Suprimmer</a></td>
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
        header("location: index.php");
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
        header("location?error=deleteeroor");
        exit;
    }
    ?>
    <a href="./index.php">Retour a la home</a>
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
    header("location: ./index.php");
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
    <a href="./index.php">Retour a la home</a>
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
    header("location: ./index.php");
    exit;
}

function getFooter()
{
?>
</body>
</html>
<?php
}