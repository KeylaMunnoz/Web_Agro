function confirmacion() {
    if(confirm("¿Está seguro que desea modificar?")){
        alert("Se ha modificado correctamente los datos.");
        return true;
    }else{
        alert("Modificación cancelada.");
        return false;
    }
}