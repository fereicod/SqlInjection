<?php
//iniciamos la sesión
session_start();

//primeramente validamos que exista un usuario en la sesión de Php,
if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    //Como se ha iniciado sesión se guarda la info a mostrar en una variable
    $data = "<a href=\"bienvenido.php?ss=1\">Cerrar sesión</a>";
    
    //También debemos revisar si el usuario ha cerrado sesión.
    if(isset($_GET['ss']))
    {
        if($_GET['ss']==1)//utilizamos el valor ss=1 a para referirnos a cerrar la sesión
        {
            session_destroy();//destruimos la sesión si así se comprueba
            redirect("index.php"); //regresamos el usuario al inicio
        }
    }
}
else
{
	$destruirPublicar="<script>
	$(function(){
		$('.publicar').remove();
		$('.usuario').remove();
	});
	</script>";
    $data="<a href=\"index.php\">Inicio</a></li>".
            "<li><a href=\"registro.php\">Registrar</a>";
    session_destroy();//destruimos toda sesión ya que no hay sesión real iniciada.
}
//En caso de que no exista una sesión deberemos enviar un mensaje para que inicie sesión


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
                <a class="publicar" href="#">
					Publicar
				</a>
            </div>
            <div>
                <a href="#12" class="sizer">A</a>
                <a href="#16" class="sizer">A</a>
                <a href="#22" class="sizer">A</a>
            </div>
        </div>          
		<div class="usuario">
			<figure class="avatar">
				<img src="images/avatar.jpg" alt="fernando" />
			</figure>
			<a class="flechita" href="#"></a>
		</div>
	</header>
	<nav>
        <ul class="menu">
            <ul>
                <li><?=$data;?><?=$destruirPublicar;?></li>
            </ul>
        </ul>
    </nav>
	<form action="">
		<p>
			<label for="titulo">Título</label>
			<input placeholder="Ingrese el título" id="titulo" type="text" name="titulo"></p>
		<p>
			<label for="autor">Autor</label>
			<input id="autor" type="text" name="autor"></p>
		<p>
			<label for="tag">Tag</label>
			<input id="tag" type="text" name="tag"></p>
			<input value="Publicar" type="submit" />
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
			<strong>Powered by Platzi</strong>
			<span class="mejor">
				mejorando.la 2013
			</span>
		</h3>
	</footer>
	<script>
	$(function(){

		$('.publicar').on('click', mostrarFormulario);

		function mostrarFormulario() {
			$('form').slideToggle();
		}

		$('form').on('submit', procesarFormulario);

		function procesarFormulario(ev) {
			ev.preventDefault();
			var titulo = $('input[name=titulo]').val();
			var autor = $('input[name=autor]').val();
			var tag = $('input[name=tag]').val();

			var template = '<article class="post"> \
				<div class="descripcion"> \
					<figure class="imagen"> \
						<img src="images/foto.jpg" /> \
					</figure> \
					<div class="detalles"> \
						<h2 class="titulo"> \
							'+titulo+' \
						</h2> \
						<p class="autor"> \
							por <a href="#">'+autor+'</a> \
						</p> \
						<a class="tag" href="#">'+tag+'</a> \
						<p class="fecha">hace <strong>0</strong> min</p> \
					</div> \
				</div> \
				<div class="acciones"> \
					<div class="votos"> \
						<a class="up" href="#"></a> \
						<span class="total">0</span> \
						<a class="down" href="#"></a> \
					</div> \
					<div class="datos"> \
						<a class="comentarios" href="#"> \
							0 \
						</a> \
						<a class="estrellita" href="#"></a> \
					</div> \
				</div> \
			</article>';

			$('.posts').prepend($(template).fadeIn());
			$('input[type=text]').val('');
			$('form').slideUp();
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

		function crearContador(valorInicial) {
			var contador = valorInicial || 0;
			return {
				up : function() {
					return ++contador;
				},
				down : function() {
					return --contador;
				}
			};
		};

		$('.total').each(function(i, elem) {
			var contTotal = crearContador(elem.innerHTML);
			$(elem)
				.siblings('.up')
					.on('click', function(ev) {
						ev.preventDefault();
						$(elem).html(contTotal.up());
					})
				.siblings('.down')
					.on('click', function(ev){
						ev.preventDefault();
						$(elem).html(contTotal.down());
					});
		});
	});
	</script>
</body>	
</html>

<?php
function redirect($uri)
{
    //función para redirigir, notese en mi entorno estoy utilizando el puerto 3000
     header( "Location: http://localhost/sql-injection/{$uri}" );
}
?>