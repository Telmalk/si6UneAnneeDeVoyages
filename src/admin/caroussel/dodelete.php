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
DELETE FROM `carrousel`
WHERE
  `id_carrousel` = :id
  ;
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_GET['id']);
$stmt->execute();

header("location: ./showCompany.php");
exit;
