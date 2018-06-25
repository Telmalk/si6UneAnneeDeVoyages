<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 25/05/2018
 * Time: 00:42
 */
require_once "./include/connection.php";
require_once "./include/function.php";
getHeader("fiche technique details");
$sql = "
SELECT
  `id_carrousel`,
  `description`,
  `title`,
  `etablissement`,
  `phone_number`,
  `url_site`,
  `img`,
  `adress`,
  `city`
FROM
  `carrousel`
WHERE
  `id_carrousel` = :id;
";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_GET['id']);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header("location: ./error.php");
    exit;
}
?>

    <a style="width: 200px; display: block; margin-top: 100px;" class="seemore-link" href="./card.php?page=all">Retour a la liste des fiches</a>
    <section class="unefiche">
    <div class="unefiche-image">
        <img class="unefiche-image-img" alt="image de la fiche technique" src="img/fiche_technique/<?=$row['img']?>"/>
    </div>
    <p class="unefiche-par">
        <?=$row['description']?>
    </p>
    <div class="unefiche-info">
        <div class="unefiche-info-col">
            <p>Téléphone : <?=$row['phone_number']?></p>
            <p><?=$row['adress']?></p>
            <p><?=$row['city']?></p>
        </div>
        <div class="unefiche-info-col">
            <p>Ouvert du lundi au vendredi</p>
            <p>9h-12h 14h-19h </p>
            <p><a href="<?=$row['url_site']?>"><?=$row['url_site']?></a></p>
        </div>
    </div>
    <div class="unefiche-qr">
        <img src="img/qrcode.jpg"/>
    </div>

</section>
<?php
    getFooter();