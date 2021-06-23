<?php  

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
    $records->bindparam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;


    if (count($results) > 0) {
        $user = $results;
    }
}

?>

<?php 
include_once 'database2.php';
$objeto = new conexion();
$conexion = $objeto->conectar();

$consulta = "SELECT * FROM datos_adopta";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
    table.datatable thead{
        background: linear-gradient(to right, #0575E6, #00F260);
        color:white;
    }
</style>
</head>
<body>
<header>
<section class="text-header">
            <h1>Mascotas y compañeros  para la vida</h1>
            <h2>Adoptame</h2>
        </section>
        <div class= "wave" style ="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
</header>

<?php if (!empty($user)): ?>
<br>wellcome. <?= $user['email'] ?>
<br> estas satisfactoriamente logueado 
<a href="logout.php">logout</a>
<?php  else: ?>
<a href="login.php">Login</a>
<?php endif; ?>

<h1 class="text-enter">Solicitudes de adopcion</h1>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table id="tabla_solicitudes" class="table-striped  table-bordered" style="width:100%">
            <thead class="text-center">
                <th>Nombre</th>
                <th>Edad</th>
                <th>Numero_telefonico</th>
                <th>Dirección</th>
                <th>Animal</th>
                <th>cedula</th>
                <th>Porque</th>
                <th>Estatus_Soli</th>
            </thead>
            <tbody>
                <?php 
                foreach ($usuarios as $usuario) {
                ?>
                <tr>
                    <td><?php echo $usuario['Nombre'] ?></td>
                    <td><?php echo $usuario['Edad'] ?></td>
                    <td><?php echo $usuario['Numero_telefonico'] ?></td>
                    <td><?php echo $usuario['Direccion'] ?></td>
                    <td><?php echo $usuario['Animal'] ?></td>
                    <td><?php echo $usuario['cedula'] ?></td>
                    <td><?php echo $usuario['Porque'] ?></td>
                    <td><?php echo $usuario['Estatus_Soli'] ?></td>
                </tr>


                


                <?php 
                }
                ?>      
            </tbody>
            </table>
        </div>
    </div>
</div>

<br>
                 <form action="Eliminar.php" method="POST">
                 Cedula: <input style="border:1px solid black" type="text" name="txtcedula" placeholder="Cedula"><br>
                 <input type="submit" value="Eliminar" name="eliminar">
                </form>


                <form action="Actualizar.php" method="POST">
                 Actualizar: <input style="border:1px solid black" type="text" name="txtced" placeholder="Cedula">
                 <input style="border:1px solid black" type="text" name="txtestatus" placeholder="Estatus">
                 <br>
                 <input type="submit" value="Actualizar" name="actualizar">
                </form>


<footer style="margin-top:200px">
        <div class="contenedor-footer">
            <div class="contenedor-foo">
                <h4>Telefono</h4>
                <p>849-885-4442</p>
            </div>
            <div class="contenedor-foo">
             <h4>email</h4>
             <p>Jhomiro018@gmail.com</p>
         </div>
         <div class="contenedor-foo">
             <h4>Ubicación</h4>
             <p>calle buenos aires/los alcarrizos/santiago</p>
         </div>
        </div>
        <h2 class="titulo-final">&copy; Animal cargo</h2>
        <a  style="display: inline-block;
    padding: 7px 0;
    color: #283773;
    text-decoration: none;
    width: 100px;
    text-align: center;
    border: 1px solid #fff;
    border-radius: 50px;
    background: #fff; "id="Btn" class="btn" href="singup.php">Registrar empleados</a>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#tabla_solicitudes').datatable();
    });
</script>
</body>
</html>