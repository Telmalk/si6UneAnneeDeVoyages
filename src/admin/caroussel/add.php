<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 23/05/2018
 * Time: 15:16
 */

session_start();
require_once "../../include/connection.php";
require_once "../function/function.php";
checkUser("../signin.php");
getHeader("../");
?>
    <form method="post" action="doadd.php"  enctype="multipart/form-data">
        <label>Titre du Post: <input type="text" name="title"></label> <br />
        <label>imge du post: <input type="file" name="img"></label> <br/>
        <label>Ville du post: <input type="text" name="citie"></label> <br/>
        <label>Nom de l'etablissement <input type="text" name="name"></label><br/>
        <label>Adresse de l'etablissment <input type="text" name="adress"></label><br/>
        <label>Numéro de l'etablissement <input type="text" name="phone"></label><br/>
        <label>Url du Site<input type="text" name="url_site"></label><br/>
        <label> Type de l'activité
            <select name="category">
                <option>Bien-être</option>
                <option>Gastronomie</option>
                <option>Sport</option>
                <option>Hebergement</option>
                <option>Culture</option>
            </select>
        </label><br/>
        <label>Description du post: <textarea name="description"></textarea></label><br/>
        <button type="submit">Valider</button>
    </form>
<?php
getFooter();