<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alexander Seidl 19961115</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>

        <form>
            <input type="text" name="textruta">
            <input type="submit">
        </form>
        <br>
        <a href="index.php?Rensa">Rensa</a>
        <?php
        //variabler
        $kakArray = array();


        if (isset($_GET["textruta"])) {

            $tmp = $_GET["textruta"];

            if (isset($_COOKIE["lista"])) {
                $kakArray = unserialize($_COOKIE["lista"]);
            }
            if ($tmp == "") {
                
            } else {
                array_push($kakArray, $tmp);
            }
            $kakStr = serialize($kakArray);

            setcookie("lista", $kakStr, time() + 3600);

            echo '<div>'.'<ol>';
            foreach ($kakArray as $skriv_ut) {
                echo '<li>' . $skriv_ut . '</li>';
            }
            echo '</ol>'.'</div>';
        } else {
            
        }
        if (isset($_GET["Rensa"])) {
            setcookie("lista", 0, time() - 3600);
        }
        ?>
    </body>
</html>
