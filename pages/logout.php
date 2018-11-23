<?php
    
     //Borrado de cookies al hacer el logout
     
     setcookie('cookielogin',null, time()-3600, '/');
     setcookie('cookiepass',null, time()-3600, '/');
     setcookie('lasthourvisited',null, time()-3600, '/');
     setcookie('lastdayvisited',null, time()-3600, '/');
      
    
     //USADO PARA PRUEBAS CON IFSET PERO AL FINAL ME HA ACABADO DANDO PROBLEMAS CON LAS COOKIES
     /*unset($_COOKIE['cookielogin']);
     unset($_COOKIE['cookiepass']);
     unset($_COOKIE['lasthourvisited']);
     unset($_COOKIE['lastdayvisited']);
    */
// Borra todas las variables de sesión 
     
     session_destroy();
     
     //Te lleva a index.php
     header("Location: ..\index.php");
     
?>
