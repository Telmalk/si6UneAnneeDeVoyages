<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 23/05/2018
 * Time: 16:39
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");
getHeader("../");
$sql = "
    SELECT
        `id_carrousel`,
        `etablissement`,
        `city`,
        `category`
    FROM
      `carrousel`;
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$nbFind = 0;
?>
<div class="container">
    <a href="./add.php"><button class="btn btn-primary">Ajouter une fiche technique</button></a>
    <a href="../index.php"><button class="btn btn-default">Retour a la home</button></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Entreprise</th>
            <th scope="col">Category</th>
            <th scope="col">Ville</th>
            <th scope="col">Modifier</th>
            <th scope="col">Suprimmer</th>
        </tr>
        </thead>
        <tbody>
<?php
 while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
         <th><?=$row['id_carrousel']?></th>
         <td><?=$row["etablissement"]?></td>
         <td><?=$row['category']?></td>
         <td><?=$row['city']?></td>
         <td><a href="./update.php?id=<?=$row["id_carrousel"]?>">Modifier</a></td>
         <td><a href="./delete.php?id=<?=$row['id_carrousel']?>">Suprimmer</a></td>
     </tr>
<?php
 $nbFind++;
 endwhile;
 ?>
        </tbody>
    </table>
    <?php
 if ($nbFind === 0) : ?>
    <p>Aucun établissement a afficher</p>
<?php
    endif;
    ?>
</div>
