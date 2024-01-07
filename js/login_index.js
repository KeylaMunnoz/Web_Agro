function validarEmail() {
    const emailInput = document.getElementById('email_IS');
    const emailError = document.getElementById('email-error');
    const emailValue = emailInput.value.trim();
  
    // Expresión para validar el formato de correo electrónico
    // const emailRegex = /^[^\s@.!#$%&'*+/=?^_`{|}~-]+[a-zA-Z0-9]+(?:\.[^\s@.]+)*@[a-z]+\.[^\s@.!#$%&'*+/=?^_`{|}~-]*$/;
    // const emailRegex = /^[^\s@.!#$%&'*+/=?^_`{|}~-]+[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-z]+\.[^\s@.!#$%&'*+/=?^_`{|}~-]*$/;
    // FUNCIONA const emailRegex = /^[a-z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-z]+\.[^\s@.!#$%&'*+/=?^_`{|}~-]*$/;
    const emailRegex = /^[a-z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-z]+(?:\.[a-zA-Z0-9]+)*$/;

    if (!emailRegex.test(emailValue)) {
      emailError.style.display = 'inline'; // Muestra el mensaje de error
      return false; // Evita que el formulario se envíe
    } else {
      emailError.style.display = 'none'; // Oculta el mensaje de error si es válido
      return true; // Permite enviar el formulario
    }
}

//PARA EL CONTROL DEL REGISTRO
function validarNom() {
    const nombreInput = document.getElementById('nombre_RU');
    const nombreError = document.getElementById('nombre-error');
    const nombreValue = nombreInput.value.trim();
  
    // Expresión para validar el formato de correo electrónico
    const nombreRegex = /^[A-Za-z]+$/;

    if (!nombreRegex.test(nombreValue)) {
      nombreError.style.display = 'inline'; // Muestra el mensaje de error
      return false; // Evita que el formulario se envíe
    } else {
      nombreError.style.display = 'none'; // Oculta el mensaje de error si es válido
      return true; // Permite enviar el formulario
    }
}
function validarAp() {
    const apellidoInput = document.getElementById('apellido_RU');
    const apellidoError = document.getElementById('apellido-error');
    const apellidoValue = apellidoInput.value.trim();
  
    // Expresión para validar el formato de correo electrónico
    const apellidoRegex = /^[A-Za-z]+$/;

    if (!apellidoRegex.test(apellidoValue)) {
      apellidoError.style.display = 'inline'; // Muestra el mensaje de error
      return false; // Evita que el formulario se envíe
    } else {
      apellidoError.style.display = 'none'; // Oculta el mensaje de error si es válido
      return true; // Permite enviar el formulario
    }
}

function validarFecha() {
  let fechaInput = document.getElementById("fecha_nac_RU");
  let fechaError = document.getElementById("fecha-error");
  //const apellidoValue = apellidoInput.value.trim();
   
  let fechaSeleccionada = new Date(fechaInput.value);
  let fechaMinima = new Date("1933-01-01");
  let fechaActual = new Date();

  if (fechaSeleccionada < fechaMinima || fechaSeleccionada > fechaActual) {
        fechaError.innerHTML = "Por favor ingrese una fecha de nacimiento válida";
        fechaError.style.display = "inline";
        return false;
  } 
  else{
      fechaError.style.display = "none";
    //   return true;
      return comprobarEdad(fechaSeleccionada, fechaActual);
  }
  
      
}
function comprobarEdad(fechaSeleccionada, fechaActual) {
    let fechaError2 = document.getElementById("fecha-error");
    // Calcular la edad del usuario
    let edad = fechaActual.getFullYear() - fechaSeleccionada.getFullYear();
    // Verificar si el cumpleaños del usuario ya ha ocurrido este año
    let mesActual = fechaActual.getMonth();
    let mesNacimiento = fechaSeleccionada.getMonth();
    let diaActual = fechaActual.getDate();
    let diaNacimiento = fechaSeleccionada.getDate();

    if (mesNacimiento > mesActual || (mesNacimiento === mesActual && diaNacimiento > diaActual)) {
      edad=edad-1;
    }

    // Comprobar si es menor de 18 años
    if (edad < 18) {
        fechaError2.innerHTML = "Para el uso de esta plataforma debe ser mayor de 18 años.";
        fechaError2.style.display = "inline";
        return false;
    } else {
        return true;
    }
}

function validarTel() {
    // Obtener el valor del input de teléfono
    var telefono = document.getElementById("telefono_RU").value;
  
    // Verificar si el teléfono comienza con "09"
    if (!telefono.startsWith("09") || telefono.length != 10) {
      // Mostrar el mensaje de error
      document.getElementById("telefono-error").style.display = "inline";
      return false;
    } else {
      // Si es válido, ocultar el mensaje de error (en caso de que estuviera visible previamente)
      document.getElementById("telefono-error").style.display = "none";
      return true;
    }
}

function validarEmailRU() {
    const emailInputRU = document.getElementById('email_RU');
    const emailErrorRU = document.getElementById('email_RU-error');
    const emailValueRU = emailInputRU.value.trim();
  
    // Expresión para validar el formato de correo electrónico
    // const emailRegexRU = /^[^\s@.!#$%&'*+/=?^_`{|}~-]+[a-zA-Z0-9]+(?:\.[^\s@.]+)*@[a-z]+\.[^\s@.!#$%&'*+/=?^_`{|}~-]*$/;
    // const emailRegexRU = /^[^\s@.!#$%&'*+/=?^_`{|}~-]+[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-z]+\.[^\s@.!#$%&'*+/=?^_`{|}~-]*$/;
    const emailRegexRU = /^[a-z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-z]+(?:\.[a-zA-Z0-9]+)*$/;


    if (!emailRegexRU.test(emailValueRU)) {
      emailErrorRU.innerHTML = "Por favor ingrese un email válido";
      emailErrorRU.style.display = 'inline'; // Muestra el mensaje de error
      return false; // Evita que el formulario se envíe
    } else {
      emailErrorRU.style.display = 'none'; // Oculta el mensaje de error si es válido
      return comprobarDominio();
    }
}
  
function comprobarDominio(){
    const emailInputRU2 = document.getElementById('email_RU');
    const emailErrorRU2 = document.getElementById('email_RU-error');
    const emailValueRU2 = emailInputRU2.value.trim();
    const dominioRU = emailValueRU2.split("@")[1];
    console.log(dominioRU);
    if(dominioRU == "agromarket.com"){
        emailErrorRU2.innerHTML = "Las cuentas con el dominio de la empresa no pueden ser registradas manualmente por el usuario";
        emailErrorRU2.style.display = "inline";
        return false;
    }
    else{
        emailErrorRU2.style.display = "none";
        return true;
    }
}

function validarContrasenaRep(){
    const contrasenaInputRU = document.getElementById('contrasena_RU');
    const contrasenaInputRepRU = document.getElementById('contrasena_RU_rep');
    const contrasenaErrorRU = document.getElementById('contrasena_RU_rep-error');

    const contrasenaValueRU = contrasenaInputRU.value.trim();
    const contrasenaValueRepRU = contrasenaInputRepRU.value.trim();
    if(contrasenaValueRU != contrasenaValueRepRU){
        contrasenaErrorRU.style.display = "inline";
        return false;
    }
    else{
        contrasenaErrorRU.style.display = "none";
        return true;
    }
}

function comprobarParaEnvio(){
    if(validarNom() && validarAp() && validarFecha() && validarTel() && validarEmailRU() && validarContrasenaRep()){  
      return true;
    }
    else{
      return false;
    }
}

  