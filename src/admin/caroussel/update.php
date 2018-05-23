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
        `title`,
        `etablissement`,
        `img`,
        `city`,
        `description`,
        `url_site`,
        `phone_number`,
        `adress`,
        `category`
    FROM
      `carrousel`
    WHERE
      `id_carrousel` = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", htmlentities($_GET['id']));
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header('location: ./showCompany.php?error=nodatatoupdate');
    exit;
}
?>

<form method="post" action="doupdate.php?img=<?=$row['img']?>&amp;id=<?=$row['id_carrousel']?>"  enctype="multipart/form-data">
    <label>Titre du Post: <input type="text" name="title" value="<?=$row['title']?>"></label><br />
    <label>imge du post: <input type="file" name="img" value="img.jpg"></label> <br/>
    <label>Ville du post: <input type="text" name="citie" value="<?=$row['city']?>"></label> <br/>
    <label>Description du post: <input type="text" name="description" value="<?=$row['description']?>"></label><br/>
    <label>Nom de l'etablissement <input type="text" name="name" value="<?=$row['etablissement']?>"></label><br/>
    <label>Adresse de l'etablissment <input type="text" name="adress" value="<?=$row['adress']?>"></label><br/>
    <label>Numéro de l'etablissement <input type="text" name="phone" value="<?=$row['phone_number']?>"></label>
    <label>Url du Site<input type="text" name="url_site" value="<?=$row['url_site']?>"></label>
    <label> Type de l'activité
        <select name="category">
            <?php
                $category = ["Bien être", "Gastronomie", "Sport", "Hebergement", "Culture"];
                $selected = whoSelected($row['category'], $category);
                $index = 0;
                while ($index < sizeof($selected)) {
                    echo $selected[$index];
                    $index++;
                }
            ?>
        </select>
    </label>
    <button type="submit">Valider</button>
