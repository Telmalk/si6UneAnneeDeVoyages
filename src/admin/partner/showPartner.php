<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 23/05/2018
 * Time: 09:59
 */

session_start();

require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");

getHeader("../");
showListPartner($pdo);
getFooter();


