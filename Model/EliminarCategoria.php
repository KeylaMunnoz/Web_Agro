

<?php
include("../Config/Conexion.php");
$idCategoria = $_GET['id'];

$sql2 = "SELECT*FROM productos p
join categoria c
on p.categoria = c.id
WHERE p.categoria='$idCategoria'"; 
  ?>


<?php
$resultado2 = mysqli_query($conexion,$sql2);
$con = 0;
if(mysqli_num_rows($resultado2)==0){
    echo '<script>
        window.onload = function cargarPagina(){
        if(confirm("¿Está seguro que desea eliminar la categoría?")){
            window.location.href = window.location.href + "&confirm=true";   
        }else{
            alert("No se han realizado cambios.");   
            window.location.replace("../View/categorias.php"); 
        }
        };
        </script>';
        if(isset($_GET["confirm"])){        
                $sql = "DELETE FROM categoria WHERE id='$idCategoria'";
            
                $resultado = mysqli_query($conexion,$sql);

                if($resultado){
                    header("location:../View/categorias.php?valor=1");  
                }else{
                    echo "Hubo un error al eliminar";
                }
}
}else{
    
    header("location:../View/categorias.php?valor=2");     
} 
?>
 

 