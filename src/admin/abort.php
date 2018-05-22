<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 18:36
 */

session_start();
echo "toto";
unset($_SESSION['user']);
unset($_SESSION["log"]);
unset($_SESSION['error']);
header("location: ./index.php");
exit;