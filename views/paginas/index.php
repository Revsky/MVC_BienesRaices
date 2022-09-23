<main class="contenedor seccion"> 
    <h1>Mas Sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia cupiditate tempora perferendis exercitationem excepturi, eligendi asperiores totam unde distinctio amet qui eius, commodi praesentium voluptatum temporibus quo dolor quas mollitia.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia cupiditate tempora perferendis exercitationem excepturi, eligendi asperiores totam unde distinctio amet qui eius, commodi praesentium voluptatum temporibus quo dolor quas mollitia.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia cupiditate tempora perferendis exercitationem excepturi, eligendi asperiores totam unde distinctio amet qui eius, commodi praesentium voluptatum temporibus quo dolor quas mollitia.</p>
        </div>
    </div>

</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en venta</h2>

    <?php 
        include 'listado.php' 
    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>

</section> 

<section class="imagen-contacto">
    <h2>Encuentra la Clase de Tus Sueños</h2>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati dolorum, quas quisquam non soluta autem cum rerum! Quidem, nemo. Illo, consectetur quisquam corporis laboriosam necessitatibus quas eligendi rem labore deleniti?</p>

    <a href="contacto.php" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion-inferior">
    <section class="blog ">
        <h3>Nuestro Blog</h3>

        <!-- Entrada de Blog -->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="imge/webp">
                    <source srcset="build/img/blog1.jpg" type="imge/jpeg">
                    <img loading="lazy" src="build/img/blog1.webp" alt="">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el Techo de tu Casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/20/2021</span>por: <span>Admin</span></p>
                </a>
                <p>
                    Consejos para construir la terraza en el techo de tu casa con los mejores materiales y ahorrando dinero 
                </p>
            </div>
        </article><!-- .article -->

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="imge/webp">
                    <source srcset="build/img/blog2.jpg" type="imge/jpeg">
                    <img loading="lazy" src="build/img/blog2.webp" alt="">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoración de tu Hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/20/2021</span>por: <span>Admin</span></p>
                </a>
                <p>
                    Maximiza el espacio en tu hogar con esta  
                </p>
            </div>
        </article><!-- .article -->
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atención y la cala que me ofrecieron cumple con mis expectativas
            </blockquote>
            <p>Angel J.</p>
        </div>
    </section>
</div>