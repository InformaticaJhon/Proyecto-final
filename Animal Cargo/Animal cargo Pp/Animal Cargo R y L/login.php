<?php 
session_start();

if (isset($_SESSION['user_id'])) {
    header('location: /Animal%20cargo/Animal%20cargo%20Pp/Animal%20Cargo%20R%20y%20L/index.php');
}

require 'database.php';


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $records->bindparam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('location: /Animal%20cargo/Animal%20cargo%20Pp/Animal%20Cargo%20R%20y%20L/index.php');

    }else {
        $message = 'lo siento, las credenciales no corresponden';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

<h1>Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="ingrese su contraseña">
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
        <a  style="display: inline-block;
    padding: 7px 0;
    color: #283773;
    text-decoration: none;
    width: 100px;
    text-align: center;
    border: 1px solid #fff;
    border-radius: 50px;
    background: #fff;" id="Btn1" class="btn" href="../index.html">Pagina inicio</a>
    </footer>
</body>
</html>