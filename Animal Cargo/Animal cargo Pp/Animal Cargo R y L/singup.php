<?php 
require 'database.php';

$message = '';

if (!empty($_POST['Nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (Nombre,email,password) VALUES (:Nombre, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':Nombre',$_POST['Nombre']);
    $stmt->bindparam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindparam(':password',$password);

    if ($stmt->execute()) {
       $message = 'se ha creado correctamente';
    }else {
        $message = 'lo siento, Ha ocurrido un error';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singup</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header>
<section class="text-header">
            <h1>Mascotas y compañeros  para la vida</h1>
            <h2>Adoptame</h2>
        </section>
        <div class= "wave" style ="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
</header>

<?php  if (!empty($message)):?>
<p><?=  $message ?></p>
<?php  endif ?>

<h1>Registrar</h1>
<form action="singup.php" method="post">
        <input type="text" name="Nombre" placeholder="Ingrese su Nombre">
        <input type="text" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="ingrese su contraseña">
        <input type="password" name="confirm_password" placeholder="confirme su contraseña">
        <input type="submit"  value="Send">


    </form>
    <footer>
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
        <a style="display: inline-block;
    padding: 7px 0;
    color: #283773;
    text-decoration: none;
    width: 100px;
    text-align: center;
    border: 1px solid #fff;
    border-radius: 50px;
    background: #fff;" id="Btn" class="btn" href="login.php">login</a>
    </footer>
</body>
</html>