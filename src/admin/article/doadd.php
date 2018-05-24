<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 17:02
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");
$sql = "
INSERT INTO `articles`
SET
`title` = :title,
`img` = :img,
`content` = :content,
`spawnDate` = :today,
`id_user` = :id_user,
`category` = :category;
";

if (saveFile("../../img/articles/","img") !== 0) {
    header("location: ./showArticle.php?error=nopictoadd");
    exit;
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":title", $_POST['title']);
$stmt->bindValue(":img", $_FILES['img']['name']);
$stmt->bindValue(":content", $_POST['content']);
$stmt->bindValue(":today", $_POST['today']);
$stmt->bindValue(":category", $_POST['category']);
$stmt->bindValue(":id_user", intval($_SESSION['user']['id']));
$stmt->execute();

header("location: ./showArticle.php");
exit;