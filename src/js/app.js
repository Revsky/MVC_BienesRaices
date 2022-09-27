document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    /* Función para crear un efecto oscuro en nuestra aplicación */
    darkMode();

});

function darkMode(){
    
    const darModeOn = window.matchMedia('(prefers-color-scheme: dark)') // Permite detectar el tema del sistema

    /* if (darModeOn.matches){
        document.body.classList.add('dark-mode')
    }else{
        document.body.classList.remove('dark-mode')
    } */

    /* Agregamos un evento de escucha y cuanod el usuario cambie el tema del sistema nuestra aplicación tambien lo ahara */

    darModeOn.addEventListener('change',function(){
        if (darModeOn.matches){
            document.body.classList.add('dark-mode')
        }else{
            document.body.classList.remove('dark-mode')
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click',function(){
        document.body.classList.toggle('dark-mode')
    });
}

function eventListeners(){

    const monileMenu = document.querySelector('.mobile-menu');
    monileMenu.addEventListener('click',navegacionResponsive);

    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')

    metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodosContacto))
   
}   

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar')
    }else{
        navegacion.classList.add('mostrar')
    }

    /* Opcionalmente podemos usar la funcion toggle que agrega una clase si esta o la elimina si no esta */
    /* 
        - navegacion.toggle('mostrar')
    */
}

function mostrarMetodosContacto(event){
    const contactoDiv = document.querySelector('#contacto');
    
    if(event.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        <label for="telefono">Telefono:</label>
        <input id="telefono" type="tel" placeholder="(+52)" name="contacto[telefono]" >

        <p>Elija Fecha y hora para la llamada</p>

        <label for="fecha">Fecha:</label>
        <input id="fecha" type="date" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">

        `
    }else{
        contactoDiv.innerHTML = `
            <label for="email">E-Mail:</label>
            <input id="email" type="email" placeholder="correo@correo.com" name="contacto[email]" >
        `
    }


}