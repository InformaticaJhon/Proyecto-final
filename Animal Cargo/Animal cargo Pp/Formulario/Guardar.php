<?php
$Usuario = "root";
$Contraseña = "";
$Servidor = "localhost";
$Basedatos = "formulario";


$conexion = mysqli_connect($Servidor,$Usuario,"") or die ("Hubo un error en nuestra base de datos");

mysqli_select_db($conexion, $Basedatos) or die ("Hubo un error en nuestra base de datos");

$Nombre = $_POST['nombre'];
$Edad = $_POST['Edad'];
$Numero_telefonico = $_POST['Numero_de_telefono'];
$Direccion = $_POST['Direccion'];
$Animal = $_POST['Animal'];
$Cedula = $_POST['cedula'];
$Porque = $_POST['Porque'];
$Estatus = ("Revicion");





$sql="INSERT INTO datos_adopta VALUES ('$Nombre',$Edad,'$Numero_telefonico','$Direccion','$Animal','$Cedula','$Porque','$Estatus')";




$ejecutar=mysqli_query($conexion, $sql);




if(!$ejecutar){

echo "Huvo un error :(";



}else{

echo "Se envieron los datos correctamente: <br> <a href='index.html'>voler</a>";

}




?>