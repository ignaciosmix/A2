<?php
    
     //Borrado de cookies al hacer el logout
     
if(isset($_COOKIE['cookielogin']) || isset($_COOKIE['cookiepass']) ) {
    if(isset($_COOKIE['lasthourvisited']) || isset($_COOKIE['lastdayvisited']) ) {

     unset($_COOKIE['cookielogin']);
     unset($_COOKIE['cookiepass']);
     unset($_COOKIE['lasthourvisited']);
     unset($_COOKIE['lastdayvisited']);


     setcookie('cookielogin',null, time()-3600, '/');
     setcookie('cookiepass',null, time()-3600, '/');
     setcookie('lasthourvisited',null, time()-3600, '/');
     setcookie('lastdayvisited',null, time()-3600, '/');
      

     
    }
}
// Borra todas las variables de sesión 
     
     session_destroy();
     
     //Te lleva a index.php
     header("Location: ..\index.php");
     
?>