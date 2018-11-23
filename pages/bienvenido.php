<?php

 //Nos mostrara una pagina web en el iframe en este caso la web de la academia nuria
        
        $url = "https://www.escolesnuria.cat/ca/";
        
        
        //Usamos las cookies anteriores de hora y dia para poder mostrarlo (solo en el caso de que hayamos seleccionado lo de recordar se mostrara la ultima visita, sino no)
        
    if(isset($_COOKIE['cookielogin']) || isset($_COOKIE['cookiepass']) ) {
    

        $visita = "Última visita a las ". $_COOKIE["lasthourvisited"] . " del ". $_COOKIE["lastdayvisited"];
        //la printamos
        echo $visita;
        echo "<br><br>";
        
    }
               
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--Daremos la bienvenida al usuario usando la cookie de usuario guardada anteriormente-->
        <h1>Benvingut <?php echo $_COOKIE["cookielogin"];?> </h1>
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
        
        <!--iFrame para que el usuario pueda navegar usando URL-->
        <label>Introduce una URL</label><br>
        <input type="text" name="url"/><br><br>
        <iframe height="450px" width="650px" src=<?php echo $url;?>></iframe><br><br>
        <a href="logout.php">Log out</a>
        </form>
        
    </body>
</html>