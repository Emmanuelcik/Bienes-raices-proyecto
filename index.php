<?php 
require "includes/funciones.php";
incluirTemplate("header", $inicio = true);
?>
    <main class="contenedor seccion">
        <h1>Más Sobre Nostros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img class="icon" src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque enim exercitationem debitis tempora. Odio, fugit maiores eaque, omnis exercitationem aspernatur non laudantium accusantium sed quibusdam ad earum placeat. Esse, dolorum!</p>
            </div>
            <div class="icono">
                <img class="icon" src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque enim exercitationem debitis tempora. Odio, fugit maiores eaque, omnis exercitationem aspernatur non laudantium accusantium sed quibusdam ad earum placeat. Esse, dolorum!</p>
            </div>
            <div class="icono">
                <img class="icon" src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque enim exercitationem debitis tempora. Odio, fugit maiores eaque, omnis exercitationem aspernatur non laudantium accusantium sed quibusdam ad earum placeat. Esse, dolorum!</p>
            </div>
        </div> <!--fin de div para iconos-->
        <section class="seccion contenedor">
            <h2>Casas y Depas En Venta</h2>

            <?php 
                $limite = 3;
                include "includes/templates/anuncios.php";
            ?>
                
            </div><!--Contenedor de anuncios-->
            <div class="alinear-derecha">
                <a class="boton-verde" href="anuncios.php"> Ver Todas</a>
            </div>
        </section>

        <section class="imagen-contacto">
            <h2>Encuetra La Casa de Tus Seuños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="contacto.php" class="boton-amarillo">Contactanos</a>
        </section> <!-- Contacto -->

        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Nuestro Blog</h3>

                <article class="entrada-blog">
                    <div>
                        <picture>
                            <source srcset="build/img/blog1.webp" type="image webp">
                            <source srcset="build/img/blog1.jpg" type="image jpeg">
                            <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.php">
                            <h4>Terraza en el techo de tu casa</h4>
                            <p class="info-meta">Escrito el: <span>20/04/2021</span> por: <span>Admin</span></p>

                            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                        </a>
                    </div>

                </article>

                <article class="entrada-blog">
                    <div>
                        <picture>
                            <source srcset="build/img/blog2.webp" type="image webp">
                            <source srcset="build/img/blog2.jpg" type="image jpeg">
                            <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.php">
                            <h4>Guía para la decoracion de tu hogar</h4>
                            <p class="info-meta">Escrito el: <span>20/04/2021</span> por: <span>Admin</span></p>

                            <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                        </a>
                    </div>
                </article>

            </section>

            <section class="testimoniales">
                <h3>Testimonios</h3>
                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mes expectativas.
                    </blockquote>
                    <p>- Emmanuel Lopez</p>
                </div>
            </section>
        </div>
    </main>

<?php 
    incluirTemplate("footer");
?>