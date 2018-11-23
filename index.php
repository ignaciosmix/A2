<!DOCTYPE html>
<?php
//inici de sessió
session_start();
//leemos fichero json
$dades=(array) json_decode(file_get_contents('json/dades.json'));
//recojemos lo enviado por el metodo post desde formulario
$login=$_POST['login'];
$pass=$_POST['pass'];
//Comprueba que la informacion de los input coincide con el fichero json
if(!empty($_POST['login']) && !empty($_POST['pass'])){
    if($login == $dades['login'] && $pass ==$dades['pass']){
        
        //Si checkeamos el checkbox de recordar se crearan las cookies
        if($_POST['recuerdame'] == true){
            setcookie("cookielogin",$login);
            setcookie("cookiepass",$pass);
            $recordar1=$_COOKIE["cookielogin"];
            $recordar2=$_COOKIE["cookiepass"];
            
            //Definimos las variables hora y dia para poder usarlos mas adelante
            $hora = date("h:i:s");
            $dia = date("d/m/Y");
            
            
            //Creamos las cookies (con la variable hora y dia)
            setcookie("lasthourvisited",$hora);
            setcookie("lastdayvisited",$dia);
            
            $recordar3= $_COOKIE['lasthourvisited'];
            $recordar4= $_COOKIE['lastdayvisited'];
            
          if(!isset($_SESSION['count'])){
                $_SESSION['count']=1;
            }else{
                $_SESSION['count']++; 
            } 
            
            //nos redijira a la pagina bienvenido
            header("Location: pages/bienvenido.php");
            
   
        }
        
    //Si hacemos el login PERO NO MARCAMOS LA CASILLA DE RECORDAR tambien
    //nos rederigirá a bienvenido pero sin guardar las cookies.
        
            header("Location: pages/bienvenido.php");
            
    //Si el login no es correcto  nos mostrará un mensaje de login incorrecto   
    }else{
        echo 'Contraseña incorrecta';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina de inicio</title>
    </head>
    <body>
        <h1>Iniciar sesión</h1>
        <!-- Formulario en metodo post que enviara los registros del usuario"-->
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <!--<h1><?= $dades['login'] ?></h1>-->
            <label>Nombre de usuario</label><br>
            <input type="text" name="login"/><br><br>
            <label>Contraseña</label><br>
            <input type="password" name="pass"/><br><br>
            <label>Recordarme en este equipo</label><br>
            <input type="checkbox" name="recuerdame"/><br><br>
            <input type="submit" name='enviar' value="Iniciar Sesión"/>
        </form>
        
        <br>
        <br>
    <h2> LogIn para testear</h2>
    
        <table border="1">
            
            <tr>
                <td> Nombre de Usuario</td>
                <td> Contraseña</td>
                
            </tr>
            
            <tr>
                <td> ignacio</td>
                <td> linuxlinux</td>
                
            </tr>
            
            
        </table>
        
    </body>
</html>
