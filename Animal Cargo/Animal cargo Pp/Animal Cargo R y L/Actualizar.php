<?php
$Usuario = "root";
$Contraseña = "";
$Servidor = "localhost";
$Basedatos = "formulario";


$conexion = mysqli_connect($Servidor,$Usuario,$Contraseña,$Basedatos) or die ("Hubo un error al conectar a nuestra base de datos");

$cedula = $_POST['txtced'];
$Estatus = $_POST['txtestatus'];




if ($cedula=="") {
    echo "Huvo un error al Actualizar los datos";
}else{
    if ($cedula) {
       
        mysqli_query($conexion, "UPDATE datos_adopta SET  Estatus_Soli = '$Estatus' Where cedula='$cedula'");
        echo "Se Actualizaron los datos correctamente: <br> <a href='index.php'>voler</a>";
    }else {
echo "No se Actualizaron los datos";
    }
   
}

?>