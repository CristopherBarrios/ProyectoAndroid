<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Hola</title>
      <link rel="stylesheet" href="css/style1.css"> 
      <link rel="stylesheet" href="css/efectos.css">
      <link rel="stylesheet" href="css/letras1.css">
</head>
<body>

  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><a href="#" id="loginform">Administrador</a> | <a href="pedir.php">Contactanos</a></h2>
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">

           <form action="validar.php" method="post">
             <label>Email</label>
             <input type="email" name="mail" placeholder="example@example.com" />

             <label >Password</label>
             <input type="password" name="pass" placeholder="Password" />

             <input type="submit" name="submit" value="Aceptar" />
             </form>
     
           <form method="post" action="" >
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>

		</td>
		</tr>
		</table>
		</div></center></div></center>
<div class="">
<center><table>
<tr>
<td><img src="pictures/logo.png" width="135" height="135"></td>
<td><h1>QRAPP</h1></td>
<td><img src="pictures/logo1.png" width="135" height="135"></td>
</tr>
</table></center>
</div>
</head>
<body id="bd" class="bd fs6 com_content  body homepage" style="position: relative; min-height: 100%; top: 0px;">

<center>
	 <div align="center">
<div id="contenedor">
  <div id="cabecera">
  </div>
  </div>
  </div>
	<header>	
		<div class="contenedor" id="uno">
		<a href="pag.php"><img class="icon" src="pictures/imagen.png" alt="Enviar"></a>
			<p class="texto">Insertar</p>
		</div>

		<div class="contenedor" id="dos">
		<a href="pag2.php"><img class="icon" src="pictures/imagen.png" alt="Enviar"></a>	
			<p class="texto">Mostrar</p>
		</div>

		<div class="contenedor" id="tres">
			<a href="pag3.php"><img class="icon" src="pictures/imagen.png" alt="Enviar"></a>
			<p class="texto">Modificar</p>
		</div>

		<div class="contenedor" id="cuatro">
		<a href="pag4.php"><img class="icon" src="pictures/imagen.png" alt="Enviar"></a>
			<p class="texto">Eliminar</p>
		</div>
	</header>
</center>	
</body>
</html>
