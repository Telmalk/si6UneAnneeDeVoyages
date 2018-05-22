<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:09
 */

session_start();
require_once "../include/connection.php";
require_once "./function/function.php";

if (!isset($_SESSION['log'])) {
    if ($_SESSION['user']['name'] === NULL || $_SESSION["user"]["name"] === NULL) {
        header("location: ./signin.php");
        exit;
    }
    header("location: ./signin.php");
    exit;
}
getHeader();
getContentAdmin($pdo);
getFooter();
