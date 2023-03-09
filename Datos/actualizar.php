<?php


include_once 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    //Nombre 	Descripcion 	Ubicacion 	
    $nombre = $_GET['nombre'];
    $descripcion = $_GET['descripcion'];
    $ubicacion = $_GET['ubicacion'];

    $my_query = "INSERT INTO Facultad (Nombre, Descripcion, ubicacion) VALUES ('$nombre', '$descripcion', '$ubicacion')";

    $result= $sqli-> query($my_query);

    if($sqli->affected_rows>0){

        echo "Registro exitoso";

    }

    else{

        echo "Error al registrar";

    }


}
?>