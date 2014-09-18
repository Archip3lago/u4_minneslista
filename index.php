<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Alexander Seidl 19961115</title>
    </head>
    <body>
        
        <form>
            <input type="text" name="textruta">
            <input type="submit">
        </form>
        <?php
        if(isset($_GET["textruta"])){
            
            $tmp = $_GET["textruta"];
            
            $kakArray = unserialize($_COOKIE["list"]);
            
            array_push($kakArray, $tmp);
            
            $kakStr = serialize($kakArray);
            
            setcookie("list", $kakStr, time()+3601);
            
            echo $kakStr . '<br>';

//              echo $_COOKIE["lista"];
//            
//              $skovit = array();
//              
//              
//              array_push($skovit, $tmp);
//              
//              setcookie("lista", serialize($skovit), time()+3600);
//              
//              echo $_COOKIE["lista"];
//              
//            
//            $tmp = $_GET["textruta"];
//            array_push($skovit, $tmp);
//            
//            var_dump($skovit);
                
        
        }
        else{
            
        }
            
        ?>
    </body>
</html>
