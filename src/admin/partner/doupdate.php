<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 20:28
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");

$sql = "
UPDATE
  `partner`
SET
  `name` = :dname,
  `logo` = :logo,
  `categorie` = :category
WHERE
  `id_partner` = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":dname", $_POST["name"]);
$stmt->bindValue(":category", $_POST["category"]);
$stmt->bindValue(":id", $_GET["id"]);
if (!empty($_FILES['logo']['name']) && $_FILES['logo']['name'] !== $_GET['img']) {
    unlink("../../img/partenaire/" . $_GET['img']);
    saveFile("../../img/partenaire/", "logo");
    $stmt->bindValue(":logo",htmlentities($_FILES["logo"]['name']));
} else {
    $stmt->bindValue(":logo", htmlentities($_GET['img']));
}
$stmt->execute();

header("location: showPartner.php");
exit;

