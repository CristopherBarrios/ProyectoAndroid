<?php
echo "<link rel='stylesheet' type='text/css' href=''>";
session_start();

class Conectar{
	public static function con(){
		$conexion = mysqli_connect("localhost","root","");
		mysqli_query("SET NAMES'UTF8'");
		mysqli_select_db("heroesApis");
		return $conexion;
	}
}
class insertar{
	public function insertar1($nom,$rol)
	{
		$sql="INSERT INTO hero VALUES ('$nom','$rol');";
		$res=mysqli_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
			alert('El registro se realizo correctamente');
			window.location='pag.php';
			</script>";
	}
}

class eliminar{
	public function eliminar1($id){
		$sql="DELETE FROM hero WHERE id='$id'";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
			alert('El registro se elimino correctamente');
			window.location='pag.php';
			</script>";
	}
}
class actualizar{
	public function actualizar1($id,$nom,$ape,$tel){
		$sql="UPDATE hero SET name='$nom',role='$rol' WHERE id='$id'";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
			alert('El registro se actualizo correctamente');
			window.location='pag.php';
			</script>";
	}
}
class buscar{
	public function buscar1($id){
		if($id>0){
		$sql="SELECT * FROM hero WHERE id='$id';";
		$res=mysql_query($sql,Conectar::con());
		echo  "<table class='tabla'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nombre</th>";
		echo "<th>Role</th>";
		echo "</tr>";
		while ($row = mysql_fetch_array($res)){
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}else{
		$sql="SELECT * FROM hero";
		$res=mysql_query($sql,Conectar::con());
		echo  "<table class='tabla'>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nombre</th>";
		echo "<th>Role</th>";
		echo "</tr>";
		while ($row = mysql_fetch_array($res)){
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
}
?>