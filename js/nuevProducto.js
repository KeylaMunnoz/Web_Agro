function ingresoID(event) {
    var tecla = event.which || event.keyCode;
    if (tecla === 13) { 
        event.preventDefault(); 
        let valorIngresado = document.getElementById("ID").value;
        let x = document.getElementById("ID");
        
        // Validar que el valor ingresado contenga solo números
        if (!/^\d+$/.test(valorIngresado)) {
            alert("El ID debe contener solo números.");
            x.value = "";
            return;
        }

        // Validar que el primer dígito no sea 0
        if (valorIngresado.charAt(0) === "0") {
            alert("El primer dígito no puede ser 0.");
            x.value = "";
            return;
        }
  
        if (valorIngresado.length === 4) {
            fetch(`../Model/controlesProducto.php?valor=1&id=${valorIngresado}`)
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    if (data == 0) { 
                        let y = document.getElementById("NOMBRE");
                        y.focus();
                    } else {
                        alert("El ID ingresado ya existe, digite uno nuevo");
                        x.value = "";
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            alert("El ID debe ser de 4 dígitos");
            x.value = "";
        }
    }
}

  
  
  function ingresoNombre(event) {
      let tecla = event.which || event.keyCode;
      if (tecla === 13) { 
          event.preventDefault(); 
          let valorIngresado = document.getElementById("NOMBRE").value;
          let x = document.getElementById("NOMBRE");
          
          // Expresión regular para verificar si el valor contiene números
          let contieneNumeros = /\d/.test(valorIngresado);
  
          if (valorIngresado.length > 1 && !contieneNumeros) {
              fetch(`../Model/controlesProducto.php?valor=2&nombre=${valorIngresado}`)
                  .then(response => response.text())
                  .then(data => {
                      // Aquí se ejecutará el código cuando la solicitud sea completada y exitosa
                      console.log(data);
                      if (data == 0) {
                          let y = document.getElementById("PRECIO");
                          y.focus();
                      } else {
                          alert("El nombre ingresado ya existe, digite uno nuevo");
                          x.value = "";
                      }
                  })
                  .catch(error => {
                      // Aquí se ejecutará el código en caso de error
                      console.error('Error:', error);
                  });
          } else {
              alert("Ingrese un nombre válido sin números y con más de una letra");
              x.value = "";
          }
      }
  }
  
  
  
  function ingresoPrecio(event) {
      var tecla = event.which || event.keyCode;
      if (tecla === 13) {
        event.preventDefault();
        const valorIngresado = document.getElementById("PRECIO").value;
        let x = document.getElementById("PRECIO");
        
        // Expresión regular para verificar que sea un número positivo con máximo dos decimales
        const regex = /^\d+(\.\d{1,2})?$/;
        
        if (regex.test(valorIngresado) && parseFloat(valorIngresado) > 0) {
          let y = document.getElementById("CANTIDAD");
          y.focus();
        } else {
          alert("Ingrese un número válido mayor a 0 y con máximo dos decimales.");
          x.value = "";
        }
      }
  }
  
  function ingresoCantidad(event) {
      var tecla = event.which || event.keyCode;
      if (tecla === 13) {
        event.preventDefault();
        const valorIngresado = document.getElementById("CANTIDAD").value;
        let x = document.getElementById("CANTIDAD");
        
        // Expresión regular para verificar que sea un número entero positivo
        const regex = /^[1-9]\d*$/;
        
        if (regex.test(valorIngresado)) {
          let y = document.getElementById("DESCRIPCION");
          y.focus();
        } else {
          alert("Ingrese un número válido entero mayor a 0.");
          x.value = "";
        }
      }
    }
  
    function ingresoDescripcion(event) {
      var tecla = event.which || event.keyCode;
      if (tecla === 13) {
        event.preventDefault();
        const valorIngresado = document.getElementById("DESCRIPCION").value;
        let x = document.getElementById("DESCRIPCION");
        if (valorIngresado.length>5) {
          let y = document.getElementById("miSelect");
          y.focus();
      }else{
          alert("Ingrese una descripción más extensa");
          x.value="";
      }
      }
    }