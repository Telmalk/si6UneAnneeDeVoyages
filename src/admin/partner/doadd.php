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

var_dump($_POST);
addPartner($pdo);
exit;