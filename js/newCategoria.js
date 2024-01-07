
  
   function proceso1(event){
      
      if (event.keyCode === 13) { 
        event.preventDefault(); 
        let valorIngresado = document.getElementById("idCategoria").value;
        let x = document.getElementById("idCategoria");
        if (valorIngresado.length === 4) {
          fetch(`../Model/controlesCategoria.php?valor=1&id=${valorIngresado}`)
          .then(response => response.text())
          .then(data => {
              // Aquí se ejecutará el código cuando la solicitud sea completada y exitosa
              console.log(data);
              dataid=data;
              if(data==0){
                  document.getElementById("nombreCategoria").focus();
              }else{
                  alert("El ID ingresado ya existe, digite uno nuevo.");
                  x.value = "";
              }
          });
      } else {
          alert("El ID de la Categoría debe ser de 4 dígitos.");
          x.value = "";
        }
      }
   }
  
   function proceso2(event){
      if (event.keyCode === 13) { 
          event.preventDefault(); 
          let valorIngresado = document.getElementById("nombreCategoria").value;
          let x = document.getElementById("nombreCategoria");
          if (valorIngresado !="") {
            fetch(`../Model/controlesCategoria.php?valor=2&nombre=${valorIngresado}`)
            .then(response => response.text())
            .then(data => {
                // Aquí se ejecutará el código cuando la solicitud sea completada y exitosa
                datanom=data;
                if(data==0){
                  if(validacion()){
                    document.getElementById("Subir").focus();
  
                  }else{
                    alert("La ID de la Categoría es obligatoria.");
                    document.getElementById("idCategoria").focus();
                  }
                
                  }else{
                    alert("El nombre ingresado ya existe, digite uno nuevo.");
                    x.value = "";
                }
            });
          }else {
            alert("El campo debe ser completado.");
            x.value = "";
          }
        }
   }
   function validacion(){
    if(document.getElementById("idCategoria").value!=""){
        return true;
    }else{
      return false;
    }
   }
  
   function validacion2(){
 
    if((document.getElementById("idCategoria").value=="")&&(document.getElementById("nombreCategoria").value=="")){
      alert("Los campos son obligatorios,a por favor completelos.");
      document.getElementById("idCategoria").focus();
    }//else{
       // existeId();
   // }
   }
   
   var dataid =0;
   var datanom =0;
function existeId(){
    let valorIngresado = document.getElementById("idCategoria").value;
     
    fetch(`../Model/controlesCategoria.php?valor=1&id=${valorIngresado}`)
      .then(response => response.text())
      .then(data => {
        if(data!=0){
            alert("Una categoría ya tiene ese código. Vuelva a ingresar.");
            document.getElementById("idCategoria").value="";
            document.getElementById("idCategoria").focus();
            
        }else{
            existeNom();
            document.getElementById("Subir").focus();
        }
      });   
} 
  
  function existeNom(){
    let valorIngresado = document.getElementById("nombreCategoria").value;
     
    fetch(`../Model/controlesCategoria.php?valor=2&nombre=${valorIngresado}`)
      .then(response => response.text())
      .then(data => {
        if(data!=0){
            alert("Una categoría ya tiene ese nombre. Vuelva a ingresar.");
            document.getElementById("nombreCategoria").value="";
            document.getElementById("nombreCategoria").focus();
        }else{
            document.getElementById("Subir").focus();
        }
    
     ;});
   
  } 
  