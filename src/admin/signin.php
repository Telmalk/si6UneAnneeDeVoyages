<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:07
 */

session_start();
require_once './function/function.php';

getHeader("./");
if (isset($_GET["error"])) {
    echo $_SESSION["error"]["log"];
}
formSignIn();
getFooter();