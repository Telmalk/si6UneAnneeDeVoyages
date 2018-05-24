<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 23/05/2018
 * Time: 16:40
 */
session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");

$sql = "
    UPDATE `carrousel`
    SET
    `description` = :description,
    `title` = :title,
    `city` = :citie,
    `etablissement` = :dname,
    `img` = :img,
    `url_site` = :url,
    `adress` = :adress,
    `phone_number` = :phone,
    `category` = :category
    WHERE
    `id_carrousel` = :id;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":title", htmlentities($_POST['title']));
$stmt->bindValue(":citie", htmlentities($_POST['citie']));
$stmt->bindValue(":description", htmlentities($_POST['description']));
$stmt->bindValue(":dname", htmlentities($_POST['name']));
$stmt->bindValue(":adress", htmlentities($_POST['adress']));
$stmt->bindValue(":phone", htmlentities($_POST['phone']));
$stmt->bindValue(":url", htmlentities($_POST['url_site']));
$stmt->bindValue(":category", htmlentities($_POST['category']));
$stmt->bindValue(":id", $_GET['id']);
if (!empty($_FILES['img']['name']) && $_FILES['img']['name'] !== $_GET['img']) {
    unlink("../../img/fiche_technique/" . $_GET['img']);
    saveFile("../../img/fiche_technique/", "img");
    $stmt->bindValue(":img", htmlentities($_FILES["img"]['name']));
} else {
    $stmt->bindValue(":img", htmlentities($_GET['img']));
}
$stmt->execute();

header("location: ./showCompany.php");
exit;