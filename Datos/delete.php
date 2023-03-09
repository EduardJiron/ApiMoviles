
<?php



require_once 'conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $id=$_GET['id'];

    $my_query = "DELETE FROM Facultad WHERE id='$id'";

    $result=$sqli->query($my_query);

    if($sqli->affected_rows>0){

        echo "Registro eliminado";

    }

    else{

        echo "Error al eliminar";

    }


}

?>