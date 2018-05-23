<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 20:28
 */

session_start();
require_once "../../include/connection.php";

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
$stmt->bindValue(":logo", $_POST["logo"]);
$stmt->bindValue(":category", $_POST["category"]);
$stmt->bindValue(":id", $_GET["id"]);
$stmt->execute();

header("location: showPartner.php");
exit;

