<?php 
   require "../includes/funciones.php";
    $auth = autenticado();
    if(!$auth){
        header("Location: /");
    }
//importamos la conexion a la base de datos 
require "../includes/config/database.php";
$db = conectarDB(); //obtenemos la instancia de la conexion 
$consulta = "SELECT * FROM propiedades"; //query 
$resultadoConsulta = mysqli_query($db, $consulta); //hacemos la consulta a la bd

$resultado = $_GET["resultado"] ?? null; //si lo encuetra sino le añade como null

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        $query = "SELECT imagen from propiedades where id = ${id}";
        $resultado = mysqli_query($db, $query);
        $propiedades = mysqli_fetch_assoc($resultado);
        unlink("../imagenes/" . $propiedades["imagen"]);
        //ELiminar la propiedad
        $query = "DELETE     FROM propiedades where id= ${id}";
        echo $query;
        $resultado = mysqli_query($db, $query);
        if($resultado){
            header("Location: /admin?resultado=3");
        }
    }
}

incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if( intval($resultado) === 1): ?>
            <p class="alerta exito">Propiedad Creada Exitosamente</p>
        <?php elseif( intval($resultado) === 2): ?>
            <p class="alerta exito">Propiedad Actualizada Exitosamente</p>
        <?php elseif( intval($resultado) === 3): ?>
            <p class="alerta exito">Propiedad Eliminada Exitosamente</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton-verde">Crear Prpiedad</a>

        <table class="propi">
            <thead>
                <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $propiedades = mysqli_fetch_assoc($resultadoConsulta) ): ?>
                <tr>
                    
                    <th> <?php echo $propiedades["id"]; ?> </th>
                    <th> <?php echo $propiedades["titulo"]; ?> </th>
                    <th> <img src="/imagenes/<?php echo $propiedades["imagen"]; ?>" alt="Imagen propiedad" class="imagen-tabla"> </th>
                    <th> <?php echo $propiedades["precio"]; ?> </th>
                    <th>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedades["id"]; ?>" class="boton-amarillo-block">Actualizar</a>
                        <form  class="w-100" method="POST">
                            <input type="hidden" value="<?php echo $propiedades["id"]; ?>" name="id">
                            <input type="submit" class="boton-rojo-block" value="Elimnar"> 
                        </form>
                        
                    </th>
                    
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </main>

<?php 

    mysqli_close($db);
    incluirTemplate("footer");
?>