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
checkUser("../signin.php");
$sql = "
SELECT
    `id_carrousel`,
    `etablissement`
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
    header("location: ./showCompany.php?error=nodatatodelete");
    exit;
}
getHeader("../");
?>
<div class="container">
<a style="margin-bottom: 20px;" class="btn btn-primary" href="./showCompany.php">Retour a la list des fiche technique</a>
    <p><strong>Etes vous sur de vouloir suprimmer l'etablissement <?=$row['etablissement']?></strong></p>
<a href="dodelete.php?id=<?=$row['id_carrousel']?>"><button class="btn btn-success">Oui</button></a>
<a href="./showCompany.php"><button class="btn btn-danger">Non</button></a>
</div>
<?php
getFooter();