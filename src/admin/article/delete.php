<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:52
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");
getHeader("../");
confirmDelete($pdo);
getFooter();