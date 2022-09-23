<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){?>
    <div class="anuncio">

        <img src="/imagenes/<?php echo $propiedad->imagen?>"  loading="lazy">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo?></h3>
            <p class="contenido-anuncio_descripcion"><?php echo $propiedad->descripcion?></p>
            <p class="precio">
                <?php 
                    
                    $fmt = new NumberFormatter('mx_MX', NumberFormatter::CURRENCY);
                    echo $fmt -> format( $propiedad->precio );

                ?>
            </p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="icono" src="build/img/icono_wc.svg">
                    <p><?php echo $propiedad->wc?></p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="build/img/icono_estacionamiento.svg">
                    <p><?php echo $propiedad->estacionamiento?></p>
                </li>
                <li>
                    <img loading="lazy" class="icono" src="build/img/icono_dormitorio.svg">
                    <p><?php echo $propiedad->habitaciones?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad->id ?>" class="boton boton-amarillo-block">
                Ver Propiedad
            </a>
        </div><!-- .contenido-anuncio -->
    </div><!-- .anuncio -->
    <?php }?>
</div><!-- .contenedor-anuncio -->
