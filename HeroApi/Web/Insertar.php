<!DOCTYPE html>
<?php
include('class.php');
?>

<style type="text/css">


#cuadro{
	width: 95%;
	background: #F8F8F8 ;
	padding: 25px;
	margin: 5px auto;
	border: 3px solid #D8D8D8;
}
.tamano{
	width: 90%
}
	</style>


<script type="text/javascript">
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
   };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>		

<html>
<head>
	<title>Subir Archivo</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="menu1.css">

</head>
<body>
<header>
			<div class="alert alert-info">
			<h3>BIENVENIDO ADMINISTRADOR</h3>
			</div>
		</header>
		<div id="cuadro">
		<ul>
  <li><a href="index1.php">PROGRAMAS</a></li>
  <li><a href="index2.php">ENTREVISTAS</a></li>
  <li><a href="index3.php">MUSICA</a></li>
  <li><a href="index4.php">DOCUMENTALES</a></li>
</ul>
<form action="insertar.php" method="POST" enctype="multipart/form-data">
				<table class="table">
				<tr><th colspan="5" class="bg-primary text-center" >AGREGA NUEVAS PISTAS DE AUDIO [PROGRAMAS]</th></tr>
				<tr class="bg-primary">
				<th>PORTADA</th>
				<th>NOMBRE</th>
				<th>AUDIO</th>
				<th>FECHA</th>
				<th></th>
				</tr>
				<tr class="bg-info">
				<td><input  name="myfile" type="file" class="form-control"  accept="image/*"></td>
				<td><input  name="doc_name" type="text" class="form-control" placeholder="Nombre">

				</td>
				<td><input  name="audio" type="file" class="form-control" accept="audio/*"></td>
				<?php
  				date_default_timezone_set("America/Guatemala");
  				$today = date("Y-m-d");
				?>
				<td><input  name="fechal" type="date" class="form-control" value="<?php echo $today; ?>" placeholder="Fecha"></td>
				<td><input  name="submit" type="submit" class="btn btn-success" value="AGREGAR" > </td>
				</tr>




				<tr class="bg-info">
						<td><div style="text-align:right;">
							<input  name="elim" type="submit" class="btn btn-default" value="ELIMINAR" onclick='return confirm("¿Seguro que deseas eliminar este registro? Se borraran TODOS los registros de este programa (portadas, música, etc)")'  >
						</div>
					
					</td>



					<td>
<center><select required name="opcion" class="btn">
<option hidden value="PROGRAMA">→→→PROGRAMA←←←</option>

	<?php
include('class.php');
	$res2 =  mysql_query("SELECT * FROM progra ORDER BY nombre ASC");
	while($row2 = mysql_fetch_array($res2))
{?>

<option value="<?php echo $row2['nombre']?>"> <?php echo $row2['nombre'];?></option>";
<?php } ?>
</select></center>


</form>



</td>
				
				
				<form  action="programa.php" method="POST"><td>
				<input required class="btn " type="text" name="nuevo" placeholder="Nuevo Programa..">
				<input required name="crear" type="submit" class="btn btn-default" value="CREAR" ></td></form> 
				<td></td>
				<td></td>
				</tr>
				</table>
				
			
			<center>
			<table class="table">
			<tr class="bg-primary">
				<th th colspan="5" class="bg-primary text-center">BUSCA TU PISTA DE AUDIO</th>
				<tr class="bg-info"><td><center><div class="derecha"  id="buscar"> <i><input  type="search" class="light-table-filter tamano form-control" data-table="order-table"  placeholder="BUSCA TU PISTA..."></i></div></center></td></tr>
			</tr>
				
			</table>
					
	
	</center><br>



<?php
include('class.php');

$sql = "SELECT * FROM programas ORDER BY name ASC";

$res =  mysql_query($sql);

$sqli = "SELECT * FROM progra";

$rest =  mysql_query($sqli);

?>
<div class="datagrid">
		
			<table class="order-table table">
			<thead>
				<tr class="bg-primary titulo">
				
				<th>ID</th>
				<th>IMAGEN</th>
				<th>[PROGRAMA] NOMBRE</th>
				<th>AUDIO</th>
				<th>FECHA</th>
				<th></th>
				
				</tr>
				</thead>

				<?php
					while($row = mysql_fetch_array($res)){
$fecha1=$row['fecha'];
$fecha2=date("d-m-Y",strtotime($fecha1));
					echo "<tr>
							<td>".$row['id']."</td>
							<td><img src='".$row['path']."' width='100' height='100'/></td>
							<td>".$row['name']."</td>
							<td><audio controls><source src='".$row['audio']."'/></audio controls></td>
							<td>".$fecha2. "</td>
							<td><form action='eliminar.php?id=".$row['id']."' method='POST' enctype='multipart/form-data'>

							<input name='eliminar' type='submit' class='btn btn-danger' value='ELIMINAR' onclick='return confirm(\"¿Seguro que deseas eliminar este registro?\")' ></form><br>



							<form action='modificar.php?id=".$row['id']."'method='POST' enctype='multipart/form-data'>

							<input name='submit' type='submit' class='btn btn-primary' value='MODIFICAR'  ></form> </td>
						 </tr>";
					}
				?>
			</table>
			</div>


</body>
</html>