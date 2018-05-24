<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 24/05/2018
 * Time: 00:24
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");
getHeader("../");
$sql = "
        SELECT
  `id_article`,
  `title`,
  `img`,
  `content`,
  `spawnDate`,
  `category`,
  `id_user`
  FROM
  `articles`;

    ";
    $checkNbArticles = 0;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    ?>
    <div class="container">
        <a href="./addArticle.php"><button class="btn btn-primary">Ajouter un article</button></a>
        <a href="../index.php"><button class="btn btn-default">Retour a la home</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Article</th>
                <th scope="col">Date</th>
                <th scope="col">Category</th>
                <th scope="col">Modifier</th>
                <th scope="col">Suprimmer</th>
            </tr>
        </thead>
        <tbody>
            <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <th><?=$row['id_article']?></th>
                    <td><?=$row["title"]?></td>
                    <td><?=$row['spawnDate']?></td>
                    <td><?=$row['category']?></td>
                    <td><a href="./update.php?id=<?=$row["id_article"]?>">Modifier</a></td>
                    <td><a href="./delete.php?id=<?=$row['id_article']?>">Suprimmer</a></td>
                </tr>
    <?php
            $checkNbArticles++;
        endwhile;
        ?>
        </tbody>
    </table>
    </div>
    <?php
        if ($checkNbArticles === 0) {
            ?>
                <p>Aucun article à afficher</p>
            <?php
        }