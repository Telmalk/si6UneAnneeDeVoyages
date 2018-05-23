<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 23/05/2018
 * Time: 16:39
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../../signin.php");

$sql = "
    SELECT
        `id_carrousel`,
        `etablissement`,
        `category`
    FROM
      `carrousel`;
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$nbFind = 0;
 while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <p>
        <?=$row['id_carrousel']?> Nom : <?=$row['etablissement']?> category : <?=$row['category']?>
        <a href="update.php?id=<?=$row['id_carrousel']?>">Modifier </a>
        <a href="delete.php?id=<?=$row['id_carrousel']?>">Suprimmer</a>
    </p>
<?php
 $nbFind++;
 endwhile;
 if ($nbFind === 0) : ?>
    <p>Aucun établissement a afficher</p>
<?php
    endif;
    ?>
<a href="add.php">Ajouter un etablissement</a>
