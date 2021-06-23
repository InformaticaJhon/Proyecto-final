<?php
$Usuario = "root";
$Contraseña = "";
$Servidor = "localhost";
$Basedatos = "formulario";


$conexion = mysqli_connect($Servidor,$Usuario,$Contraseña,$Basedatos) or die ("Hubo un error al conectar a nuestra base de datos");

$cedula = $_POST['txtcedula'];




if ($cedula=="") {
    echo "Huvo un error al eliminar los datos";
}else{
    if ($cedula) {
       
        mysqli_query($conexion, "DELETE FROM datos_adopta Where cedula='$cedula'");
        echo "Se eliminaron los datos correctamente: <br> <a href='index.php'>voler</a>";
    }else {
echo "No se eliminaron los datos";
    }
   
}

?>