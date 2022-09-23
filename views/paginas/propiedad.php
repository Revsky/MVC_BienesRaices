<main class="contenedor seccion contenido-centrado"> 
    <h1><?php echo $propiedad->titulo?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen ?>" alt="">

    <div class="resumen-propiedad">
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
        <p><?php echo $propiedad->descripcion?></p>
    </div>
</main>