<?php 
    require "../../includes/config/database.php";
    require "../../includes/funciones.php";
    $auth = autenticado();
    if(!$auth){
        header("Location: /");
    }

    $db = conectarDB();
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta); 
    $titulo = "";
    $precio = "";
    $descripcion = "";
    $habitaciones = "";
    $wc = "";
    $estacionamiento = "";
    $vendedorId = "";

    $errores = [];

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        $titulo = mysqli_real_escape_string( $db, $_POST["titulo"] );
        $precio = mysqli_real_escape_string( $db, $_POST["precio"] );
        $descripcion = mysqli_real_escape_string( $db, $_POST["descripcion"] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST["habitaciones"] );
        $wc = mysqli_real_escape_string( $db, $_POST["wc"] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST["estacionamiento"] );
        $creado = mysqli_real_escape_string( $db, date("Y/m/d") );
        $vendedorId = mysqli_real_escape_string( $db, $_POST["vendedor"] );
        $imagen = $_FILES["imagen"];

        // var_dump($imagen);
        

        //Creamos las validaciones
        if(!$titulo){
            $errores[] = "Debes añadir titulo";
        }
        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }
        if(!$descripcion || strlen($descripcion) < 150 ){
            $errores[] = "La descipcion es obligatoria";
        }
        if(!$habitaciones){
            $errores[] = "el numero de habitacion es obligatorio";
        }
        if(!$wc){
            $errores[] = "el numero de wc es obligatorio";
        }
        if(!$estacionamiento){
            $errores[] = "el numero de estacionamientos es obligatorio";
        }
        if(!$vendedorId){
            $errores[] = "Debes elegir el vendedor";
        }
        if(!$imagen["name"]){
            $errores[] = "La imagen es obligatoria";
        }
        
        $medida = 1000 * 100;
        if ($imagen["size"] > $medida){
            $errores[] = "La imagen es muy pesada";
        }
        
        
        if(empty($errores)){

            //subida de archivos
            //Crear una carpeta
            $carpetaImagenes = "../../imagenes/";
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            $nombreImagen = md5( uniqid(rand(), true) ) . ".jpg";

            //sube la imagen 
            move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen );
            

            //Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)
            VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId') ";
            $resultado = mysqli_query($db, $query);
            echo $resultado;
            if($resultado){
                header("Location: /admin?resultado=1");
            }
        }
    }
   
    
    incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" action="/admin/propiedades/crear.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General de nuestra propiedad</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="titulo">Precio:</label>
                <input type="number" name="precio" id="titulo" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" > <?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej:3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>
                        <option <?php echo $vendedorId === $vendedor["id"] ? "selected" : ""; ?> value="<?php echo $vendedor["id"]; ?>"> <?php echo $vendedor["nombre"] ." ". $vendedor["apellido"]; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <div class="doble">  
                <a href="/admin" class="boton-verde">Volver</a>
                <input type="submit" name="" class="boton-verde" value="Enviar">
            </div>
        </form>
    </main>

<?php 
    incluirTemplate("footer");
?>