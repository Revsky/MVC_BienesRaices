<main class="contenedor seccion"> 
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" method="POST" >
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre:</label>
            <input id="nombre" type="text" placeholder="Tu nombre:" name="contacto[nombre]" >

            <label for="email">E-Mail:</label>
            <input id="email" type="email" placeholder="correo@correo.com" name="contacto[email]" >

            <label for="telefono">Telefono:</label>
            <input id="telefono" type="tel" placeholder="(+52)" name="contacto[telefono]"  >

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" cols="30" rows="10" name="contacto[mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="contacto[tipo]">
                <option value="" disabled selected>------ Seleccione ------</option>
                <option value="compra">Compra</option>
                <option value="venta">Venta</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input id="presupuesto" type="number" placeholder="Tu precio" name="contacto[precio]" >
            
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>Como desea ser contactado</p>
            
            <div class="form-contacto">
                <!-- Para que podamos seleccionar solo un radio button deben de tener el mismo nombre en el paraemtro name -->
                <label for="contactar-telefono">Telefono:</label>
                <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                <label for="contactar-email">Email:</label>
                <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]">
            </div>

            <p>Si eligio telefono, elija la fecha y hora para ser contactado</p>

            <label for="fecha">Fecha:</label>
            <input id="fecha" type="date" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">

        </fieldset>

        <input type="submit" value="enviar" class="boton-verde">
    </form>

</main>