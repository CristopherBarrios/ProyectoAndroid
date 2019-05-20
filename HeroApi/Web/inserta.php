<?php
include("class.php");
$nuevo=new insertar();
$nuevo->insertar1($_POST["name"],$_POST["role"]);
?>