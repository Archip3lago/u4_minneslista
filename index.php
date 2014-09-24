<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alexander Seidl 19961115</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>

        
<!--        Skapar ett formulär att skriva in sina "önskade föremål" i.-->
        <form>
            <input type="text" name="textruta">
            <input type="submit">
        </form>
        <br>
        
<!--        Länk till att rensa kaka-->
        <a href="index.php?Rensa">Rensa</a>
        <?php
        //deklarerar en array
        $kakArray = array();

        //Kollar om det finns något inskrivet i formuläret
        if (isset($_GET["textruta"])) {
            
            //Skapar en temporär variabel för innehållet från forumläret
            $tmp = $_GET["textruta"];
            
            //Kollar om kakan finns
            if (isset($_COOKIE["lista"])) {
                
                //finns kakan omvandlas den från string till en array och lagras i kakArray
                $kakArray = unserialize($_COOKIE["lista"]);
            }
            if ($tmp == "") {
                //Om man har skickat ett tomt värde med formuläret sparas det inte i arrayen.
                
            } else {
                //finns inte kakan så läggs den temporära variabeln till längst bak i kakArray
                array_push($kakArray, $tmp);
            }
            //Omvandlar kakArray till en sträng och sedan lagras den i kakan "lista".
            $kakStr = serialize($kakArray);
            setcookie("lista", $kakStr, time() + 3600);

            //Skapar en div med en ordnad lista i, med hjälp av en foreach-loop skrivs varje objekt i arrayen ut som ett list-item i den ordnade listan
            echo '<div>'.'<ol>';
            foreach ($kakArray as $skriv_ut) {
                echo '<li>' . $skriv_ut . '</li>';
            }
            echo '</ol>'.'</div>';
        } else {
            
        }
        //Om man klickar på "Rensa" länken, dödar man kakan.
        if (isset($_GET["Rensa"])) {
            setcookie("lista", 0, time() - 3600);
        }
        ?>
    </body>
</html>
