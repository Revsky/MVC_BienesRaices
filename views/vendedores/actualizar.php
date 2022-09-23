<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error):?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

        <!-- Agregamos a value el vlaor de las variables para que guarden el valor que anteriormente se habria colocado por el usuario soin necesidad de que rellenen todo de nuevo -->

        <!-- debemos inicar el enctype para que podamos obtener información para subir archivos -->

        <!-- No incluimos el action ya que si no cambia el id del vendedor y no actualiza lo daros -->
    <form class="formulario" method="POST">
        
        <?php include 'formulario.php'?>

        <input type="submit" value="Guardar Cambios Vendedor(a)" class="boton boton-verde">
    </form>

</main>