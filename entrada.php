<?php 
require "includes/funciones.php";
incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image webp">
            <source srcset="build/img/destacada2.jpg" type="image jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen del anuncio">
        </picture>
        <p class="info-meta">Escrito el <span>25/04/2921</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">

            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, odio! Quis sit nobis fugit ex vel voluptatum totam recusandae non? Autem repudiandae dolore ut eaque assumenda magnam iure maiores veniam? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo delectus quae dolorem quidem. Suscipit commodi ipsum sunt dolor eveniet deserunt, in quo necessitatibus repellat eius laboriosam quis asperiores quidem excepturi? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas optio dolore maxime cum alias excepturi dolores tempore deserunt, earum sit aperiam nobis possimus illum et facere cumque. Quas, similique obcaecati.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel dolorum architecto laudantium. Delectus, fugit doloribus incidunt nam voluptatem amet, cumque aperiam assumenda quibusdam fugiat voluptate officia atque deleniti hic ad. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi culpa, libero assumenda sit blanditiis impedit aliquam delectus aliquid numquam neque atque officiis fugiat doloribus nobis ipsam pariatur labore asperiores dignissimos. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos eos laboriosam deleniti, assumenda tenetur qui cumque aut. Deleniti similique, repellat repellendus, nobis facilis odio dignissimos provident, porro animi nisi quam.
            </p>
        </div>
    </main>
<?php 
    incluirTemplate("footer");
?>