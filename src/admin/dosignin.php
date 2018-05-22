<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 17:08
 */

require_once '../include/connection.php';
require_once './function/function.php';
session_start();
doSignIn($pdo);
exit;