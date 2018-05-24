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


if (saveFile("../../img/fiche_technique/", "img") != 0) {
   header("location: ./add.php?error");
   exit;
}

$sql = "
    INSERT INTO `carrousel`
    SET
    `description` = :description,
    `title` = :title,
    `city` = :citie,
    `etablissement` = :dname,
    `img` = :img,
    `url_site` = :url,
    `adress` = :adress,
    `phone_number` = :phone,
    `category` = :category;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":title", $_POST['title']);
$stmt->bindValue(":citie", $_POST['citie']);
$stmt->bindValue(":description", $_POST['description']);
$stmt->bindValue(":dname", $_POST['name']);
$stmt->bindValue(":adress", $_POST['adress']);
$stmt->bindValue(":phone", $_POST['phone']);
$stmt->bindValue(":url", $_POST['url_site']);
$stmt->bindValue(":category", $_POST['category']);
$stmt->bindValue(":img",$_FILES["img"]['name']);
$stmt->execute();
header("location: ./showCompany.php");
exit;


