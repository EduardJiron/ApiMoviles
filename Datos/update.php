
<?php

include_once 'conexion.php';


if($_SERVER['REQUEST_METHOD']=='PUT'){

    
    
    $id=$_GET['id'];
    $nombre = $_GET['nombre'];
    $descripcion = $_GET['descripcion'];
    $ubicacion = $_GET['ubicacion'];

    $my_query = "UPDATE Facultad SET Nombre='$nombre', Descripcion='$descripcion', ubicacion='$ubicacion' WHERE id='$id'";

    $result= $sqli-> query($my_query);

    if($sqli->affected_rows>0){

        echo "Registro actualizado";

    }

    else{

        echo "Error al actualizar";

    }

}
?>