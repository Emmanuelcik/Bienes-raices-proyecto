<?php 
//autenticar usuario 
require "includes/config/database.php";
$db = conectarDB();

$errores = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string( $db, filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string( $db, $_POST["password"]);

    if(!$email){
        $errores[] = "EL email es obligatorio o no es válido";
    }
    if(!$password){
        $errores[] = "EL password es obligatorio";
    }
    if(empty($errores)){
        //revisar si un usuario existe

        $query = "SELECT * FROM usuarios WHERE email ='${email}' ";
        
        $resultado = mysqli_query($db, $query);
        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        if($resultado->num_rows){
            //Revisar si el password es correcto
            $user = mysqli_fetch_assoc($resultado);
            $auth = password_verify($password, $user["password"]);
            // echo "<pre>";
            // var_dump($auth["password"]);
            // echo "</pre>";
            if($auth){
                session_start();
                $_SESSION["email"] = $user["email"];
                $_SESSION["loged"] = true;
                // echo "<pre>";
                // var_dump($_SESSION);
                // echo "</pre>";
                header("Location: /admin");
            }else{
                $errores[] = "Contraseña incorrecta";
            }

        }else{
            $errores[] = "EL Usuario no existe";
        }
    }
}

require "includes/funciones.php";
incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <form method="POST" class="formulario" novalidate>

            <fieldset>
                <legend>Email y Password</legend>
            
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Tu E-mail" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu Contraseña" required>
            </fieldset>

            <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            <?php endforeach; ?>

            <input type="submit" value="Iniciar Sesión" class="boton-verde boton">
        </form>

        
       
    </main>

<?php 
    incluirTemplate("footer");
?>