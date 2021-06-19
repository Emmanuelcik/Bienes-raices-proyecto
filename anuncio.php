<?php 
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
    header("Location: anuncios.php");
}
require __DIR__ . "/includes/config/database.php";

$db = conectarDB();
$query = "SELECT * FROM propiedades WHERE id = ${id}";

$resultado = mysqli_query($db, $query);
if($resultado->num_rows === 0){
    header("Location: index.php");
}
$propiedades = mysqli_fetch_assoc($resultado );

require "includes/funciones.php";
incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php  echo $propiedades["titulo"];?></h1>
        <img loading="lazy" src="/imagenes/<?php echo $propiedades["imagen"]; ?>" alt="Imagen del anuncio">
        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedades["precio"]; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedades["wc"]; ?></p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p><?php echo $propiedades["estacionamiento"]; ?></p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                    <p><?php echo $propiedades["habitaciones"]; ?></p>
                </li>
            </ul>

            <p> <?php echo $propiedades["descripcion"]; ?></p>
        </div>
    </main>
<?php 
    incluirTemplate("footer");
    mysqli_close($db);
?>