function cerrar(select){
    const opcion = select.value;
    if(opcion=="cerrar"){
        window.location.href = "../Model/cerrarSesion.php";
        
    }
}