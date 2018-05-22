<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:08
 */

session_start();
require_once "./function/function.php";

getHeader();
formAddArticle("admin");
getFooter();