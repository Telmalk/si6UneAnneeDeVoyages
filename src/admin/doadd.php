<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 17:02
 */

session_start();
require_once "../include/connection.php";

$sql = "
INSERT INTO `articles`
SET
`title` = :title,
`img` = :img,
`content` = :content,
`spawnDate` = :today,
`id_user` = :id_user;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":title", $_POST['title']);
$stmt->bindValue(":img", $_POST['img']);
$stmt->bindValue(":content", $_POST['content']);
$stmt->bindValue(":today", $_POST['today']);
$stmt->bindValue(":id_user", intval($_SESSION['user']['id']));
$stmt->execute();

header("location: ./index.php");
exit;