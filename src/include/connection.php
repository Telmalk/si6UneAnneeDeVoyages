<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 22/05/2018
 * Time: 16:04
 */
try {
    $pdo = new PDO('mysql:host=localhost;dbname=voyageannee', 'root', '');
    $pdo->exec("SET NAMES UTF8");
} catch (PDOException $exception) {
    die($exception->getMessage());
}
