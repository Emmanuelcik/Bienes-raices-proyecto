<?php 
require "includes/funciones.php";
incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image webp">
            <source srcset="build/img/destacada3.jpg" type="image jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen contacto">
        </picture>
        <h2>Llene toda la informacion del formulario</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="Tu nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Tu E-mail">

                <label for="telefono">Telefono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Tu Telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" ></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Seleccione-- </option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="Tu precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend></legend>
                <p>Como deseas ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>

                <p>Si eligió telefono, elija la hora y fecha</p>

                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" >

                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" min="09:00" max="18:00">

                
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate("footer");
?>