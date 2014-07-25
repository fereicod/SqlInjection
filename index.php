<?php
session_start();
//En esta página revisamos  que no se haya iniciado sesión, si el usuario inicia
//sesión, no hay necesidad de hacer el logín, por lo que lo redirigimos a la página
//de bienvenido
if(isset($_SESSION['user']))
{
    redirect("bienvenido.php");
}

//Posteriormente ya que revisamos que no hay nadie "logeado", revisamos si hubo un
//intento de iniciar sesión, si hubo un "submit" 
if(isset($_POST['user']) && isset($_POST['password']))
{
    //usuario y password de la DB
    $dbuser ='root';
    $dbpassword ='admin';

    //primero realizamos la conexión usando esta funcion
    $db = connect($dbuser,$dbpassword);
    if($db)
    {
        //si la conexión se realiza correctamente procedemos a iniciar sesión
        login($db,$_POST['user'],$_POST['password']);    
    }
    else
    {
        echo "<p>No se pudo establecer la conexión</p>";
    }    
}
//En caso de que no se haya colocado data desde la forma 
//no hacemos nada y esperamos a que se suba la data
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>SQLInjection</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/phpmysql.png" alt="PhpMySQL" />
        </div>
        <div class="titular">
            <h1 class="titulo">
                MySQL Injection
            </h1>
            <div>
                <a class="filtro" href="#">
                    Ejemplo practico
                </a>
            </div>
            <div>
                <a href="#12" class="sizer">A</a>
                <a href="#16" class="sizer">A</a>
                <a href="#22" class="sizer">A</a>
            </div>
        </div>          
    </header>
    <nav>
        <ul class="menu">
            <ul>
                <li><a class="ingresar" href="#">Login</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="bienvenido.php">Bienvenida</a></li>
            </ul>
        </ul>
    </nav>
    <form method="post" action="index.php">
        <p>USUARIO: <input placeholder="Ingrese su correo" name="user" type="text"/></p>
        <p>CONTRASEÑA: <input placeholder="Ingrese su contraseña"name="password"type="password"/></p>
        <input type="submit" value="Ingresar"/>
        <p>Si no se ha registrado haga click <a href="registro.php">aqui</a></p>
    </form>
    <section class="bienvenida">
        <article class="box">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/bienvenida.jpg" />
                </figure>
                <div class="detalles">
                    <h1 class="titulo">
                        Bienvenid@ a mi página!<br>
                    </h1>
                    <h3 class="instrucciones">
                        Funciones activas:<br>
                    </h3>
                    <ul class="lista">
                        <li>
                            Las tres A que se muestran en la parte inferior, ajustan el tamaño de la fuente a tu preferencia.
                        </li>
                        <li>
                            En el menu, las 3 acciones estan activas, por la cual te puedes logear, registrar, y darte la bienvenida.
                        </li>
                        <li>
                            Una vez que te de la bienvenida, puedes publicar un post.
                        </li>
                        <li>
                            Si no te loggeas, no podras publicar.
                        </li>
                    </ul>
                    <p class="autor">
                        por <a href="#">Fernando Espino</a>
                    </p>
                </div>
            </div>
        </article>
    </section>
    <footer>
        <h3>
            <strong>Powered by Fernando E.I.</strong>
            <span class="mejor">
                mejorando.la 2014
            </span>
        </h3>
    </footer>
</body>
<script>
    $(function(){

        $('.ingresar').on('click', mostrarFormulario);

        function mostrarFormulario() {
            $('form').slideToggle();
        }


        function crearSizer(pixels) {
            return function() {
                $('body').css('font-size', pixels+'px');
            }
        }

        $('.sizer').each(function(i, link){
            var pixels = $(link).prop('hash').substring(1);
            $(link)
                .css('font-size', pixels+'px')
                .on('click', crearSizer(pixels));
        });
    });
</script>
</html>


<?php 

function connect($dbuser,$dbpassword)
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=practicas', $dbuser, $dbpassword);
        return $db;
        /*foreach($dbh->query('SELECT * from USERS') as $row) {
            print_r($row);
        }
        $dbh = null;*/
    } catch (PDOException $e) {
        return false;
    }
}

function login($db,$usr,$pass)
{
    $user = mysql_real_escape_string($usr); //usamos un string absoluto para evitar sqlinjection
    $password = sha1($pass); //encriptamos el password
    $query ="SELECT user FROM users WHERE user='{$user}' AND password='{$password}'";
    try {
        $db->beginTransaction();//Desactiva el modo autocommit
        $result = $db->query($query);
        
        foreach($result as $row) {
            $suser = $row['user'];
        }
        
        //Establecemos información de sesión
        $_SESSION['user']=$suser;
        $db->commit(); //termina la consulta con la DB
        
        //En este momento ya hemos validado el login de usuario, por lo que redirigimos a la página de bienvenido
        redirect("bienvenido.php");
    } catch (PDOException $e) {
        $db->rollBack();
        echo "<p>Ha ocurrido un error en el inicio de sesión.</p>";
        die();//termino del script
    }
}

function redirect($uri)
{
    //función para redirigir
     header( "Location: http://localhost/sql-injection/{$uri}" );
}

?>