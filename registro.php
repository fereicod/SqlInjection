<?php
session_start();
//En esta página revisamos  que no se haya iniciado sesión, si el usuario inicia
//sesión, no hay necesidad de hacer el logín, por lo que lo redirigimos a la página
//de bienvenido
if(isset($_SESSION['user']))
{
    redirect("bienvenido.php");
}

//Primero debemos revisar si se ha subido la data de la forma de registro
//en caso de que sí, validamos y registramos el usuario y password
if(isset($_POST['user']) && isset($_POST['password']))
{
    //usuario y password de la DB
    $dbuser ='root';
    $dbpassword ='root';

    //primero realizamos la conexión usando esta funcion
    $db = connect($dbuser,$dbpassword);
    if($db)
    {
        //si la conexión se realiza correctamente  realizamos el registro utilizando la conexión
        register($db);    
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
                <li><a class="ingresar" href="#">Registrar</a></li>
                <li><a href="bienvenido.php">Bienvenida</a></li>
            </ul>
        </ul>
    </nav>
    <form method="post" action="registro.php">
            <p>USUARIO: <input name="user" id="user" type="email" size="15" onkeyup="errVal();"/>
            </p>
            <p>CONTRASEÑA: <input name="password" id="password" type="password" size="10" onkeyup="errVal();"/>
            </p>
            <p>REPITA CONTRASEÑA: <input name="rpassword" id="rpassword" type="password" size="10" onkeyup="errVal();"/>
            </p>
            <input type="submit" value="Registrar"/>
        <div name="err" id="err"></div>
    </form>
    <section class="posts">
        <article class="post">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/foto.jpg" />
                </figure>
                <div class="detalles">
                    <h2 class="titulo">
                        Colores, gradientes y texto 3D con Sass y Compass
                    </h2>
                    <p class="autor">
                        por <a href="#">Diana Reyes</a>
                    </p>
                    <a class="tag" href="#">CSS3</a>
                    <p class="fecha">hace <strong>20</strong> min</p>
                </div>
            </div>
            <div class="acciones">
                <div class="votos">
                    <a class="up" href="#"></a>
                    <span class="total">12</span>
                    <a class="down" href="#"></a>
                </div>
                <div class="datos">
                    <a class="comentarios" href="#">
                        10
                    </a>
                    <a class="estrellita" href="#"></a>
                </div>
            </div>
        </article>
        <article class="post">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/foto.jpg" />
                </figure>
                <div class="detalles">
                    <h2 class="titulo">
                        Colores, gradientes y texto 3D con Sass y Compass
                    </h2>
                    <p class="autor">
                        por <a href="#">Diana Reyes</a>
                    </p>
                    <a class="tag" href="#">CSS3</a>
                    <p class="fecha">hace <strong>20</strong> min</p>
                </div>
            </div>
            <div class="acciones">
                <div class="votos">
                    <a class="up" href="#"></a>
                    <span class="total">69</span>
                    <a class="down" href="#"></a>
                </div>
                <div class="datos">
                    <a class="comentarios" href="#">
                        10
                    </a>
                    <a class="estrellita" href="#"></a>
                </div>
            </div>
        </article>
        <article class="post">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/foto.jpg" />
                </figure>
                <div class="detalles">
                    <h2 class="titulo">
                        Colores, gradientes y texto 3D con Sass y Compass
                    </h2>
                    <p class="autor">
                        por <a href="#">Diana Reyes</a>
                    </p>
                    <a class="tag" href="#">CSS3</a>
                    <p class="fecha">hace <strong>20</strong> min</p>
                </div>
            </div>
            <div class="acciones">
                <div class="votos">
                    <a class="up" href="#"></a>
                    <span class="total">3</span>
                    <a class="down" href="#"></a>
                </div>
                <div class="datos">
                    <a class="comentarios" href="#">
                        10
                    </a>
                    <a class="estrellita" href="#"></a>
                </div>
            </div>
        </article>
        <article class="post">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/foto.jpg" />
                </figure>
                <div class="detalles">
                    <h2 class="titulo">
                        Colores, gradientes y texto 3D con Sass y Compass
                    </h2>
                    <p class="autor">
                        por <a href="#">Diana Reyes</a>
                    </p>
                    <a class="tag" href="#">CSS3</a>
                    <p class="fecha">hace <strong>20</strong> min</p>
                </div>
            </div>
            <div class="acciones">
                <div class="votos">
                    <a class="up" href="#"></a>
                    <span class="total">156</span>
                    <a class="down" href="#"></a>
                </div>
                <div class="datos">
                    <a class="comentarios" href="#">
                        10
                    </a>
                    <a class="estrellita" href="#"></a>
                </div>
            </div>
        </article>
        <article class="post">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/foto.jpg" />
                </figure>
                <div class="detalles">
                    <h2 class="titulo">
                        Colores, gradientes y texto 3D con Sass y Compass
                    </h2>
                    <p class="autor">
                        por <a href="#">Diana Reyes</a>
                    </p>
                    <a class="tag" href="#">CSS3</a>
                    <p class="fecha">hace <strong>20</strong> min</p>
                </div>
            </div>
            <div class="acciones">
                <div class="votos">
                    <a class="up" href="#"></a>
                    <span class="total">156</span>
                    <a class="down" href="#"></a>
                </div>
                <div class="datos">
                    <a class="comentarios" href="#">
                        10
                    </a>
                    <a class="estrellita" href="#"></a>
                </div>
            </div>
        </article>
        <article class="post">
            <div class="descripcion">
                <figure class="imagen">
                    <img src="images/foto.jpg" />
                </figure>
                <div class="detalles">
                    <h2 class="titulo">
                        Colores, gradientes y texto 3D con Sass y Compass
                    </h2>
                    <p class="autor">
                        por <a href="#">Diana Reyes</a>
                    </p>
                    <a class="tag" href="#">CSS3</a>
                    <p class="fecha">hace <strong>20</strong> min</p>
                </div>
            </div>
            <div class="acciones">
                <div class="votos">
                    <a class="up" href="#"></a>
                    <span class="total">156</span>
                    <a class="down" href="#"></a>
                </div>
                <div class="datos">
                    <a class="comentarios" href="#">
                        10
                    </a>
                    <a class="estrellita" href="#"></a>
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

function register($db)
{
    //Primero obtenemos las entradas de la forma
    $user = mysql_real_escape_string($_POST['user']); //usamos un string absoluto para evitar sqlinjection
    $password = sha1($_POST['password']); //encriptamos el password
    $rpassword = sha1($_POST['rpassword']); //encriptamos la confirmación del password
    
    //Ahora validamos, si la validación es correcta procedemos a ejecutar la inserción en la DB
    if(validateInputs($user,$password,$rpassword))
    {
        //ya hemos validado los inputs, ahora comprobemos que el usuario este libre
        if(!validateUsername($db, $user))
        {
        //ahora creamos nuestra query
        $query = "INSERT INTO users(user,password) values('{$user}','{$password}')";
        try {  
            $db->beginTransaction();//iniciamos transacción DBO
            $db->exec($query); //ejecutamos la inserción de datos y el registro
            $db->commit();//terminamos la conexión exitosamente
            echo "Registro completado\n su usuario:{$_POST['user']} y su password:{$_POST['password']}".
                  "\n Entre <a href=\"bienvenido.php\">Aqui</a> para ir a la pagina de bienvenida";
          } catch (Exception $e) {
            $db->rollBack(); //Si falla la conexión, tiramos la conexión
            echo "<p>Ocurrio un error, el registro no pudo ser completado</p>";
          }            
        }else{
            echo "<p>El nombre de usuario ya existe, por lo que no se pudo completar el registro.</p>";
        }
    
    }
    else //de lo contrario cancelamos el proceso
    {
        echo "<p>Los datos de registro son invalidos, intente de nuevo.</p>";
        $db = null;
        die();
    }
    
    
    
}

function validateInputs($user,$pass,$rpass)
{
    //primeramente validamos que los passwords sean coincidentes
    if($pass!="" && $pass!=$rpass)
        return false; //si no lo son no se realiza el registro.
    //segundo validamos que el usuario sea un email
    if($user!="")
    {
        if(!filter_var($user,FILTER_VALIDATE_EMAIL))
        {
            return false; //si no es un email valido no pasa la prueba
        }
    }
    return true; // si pasa las pruebas se regresa un valor verdadero
}

//Esta función es muy importante, pues validamos que el nombre de usuario sea unico
function validateUsername($db,$username)
{
    $existe=false; //por defecto asumimos que no existe el nombre de usuario
    $username = mysql_real_escape_string($username);
    $query = "SELECT user FROM users WHERE user='{$username}'";
        try {  
            $db->beginTransaction();//iniciamos transacción DBO
            $result = $db->query($query); //Consultamos si ya existe el username
            //terminamos la conexión exitosamente
            $db->commit();
            foreach ($result as $value) {
            echo $value['user']."<br/>";  
            echo $username."<br/>";
           //en caso de haber encontrado una coincidencia regresamos false para denegar el registro
           if($value['user']==$username)
               $existe = true; //se encontro una coincidencia
               return $existe;
           }
            
          } catch (Exception $e) {
            $db->rollBack(); //Si falla la conexión, tiramos la conexión
            echo "<p>Ocurrio un error, el registro no pudo ser completado</p>";
            $existe=false; //colocamos falso para evitar crear un registro cuando hubo error
          }   
          return $existe;
}

function redirect($uri)
{
    //función para redirigir, notese en mi entorno estoy utilizando el puerto 3000
     header( "Location: http://localhost/sql-injection/{$uri}" );
}
?>
