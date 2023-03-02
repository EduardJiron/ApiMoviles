<?php

require_once 'conexion.php';

switch($_SERVER["REQUEST_METHOD"]){

    case "GET":
        
    $my_query="SELECT * FROM Facultad ";

    $result = $sqli->query($my_query);

    if($sqli->affected_rows>0){
        $json="{ \"Datos\": [";
        while($row=$result->fetch_assoc()){
            $json=$json. json_encode($row);
            $json=$json.",";
        }
        $json=substr(trim($json),0,-1);
        $json.="]}";



    }
    echo $json;

    break;

    case "POST":



            if(!isset($_POST['id']) and !isset($_POST['nombreb'])){
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $ubicacion = $_POST['ubicacion'];
            
                    $my_query = "INSERT INTO Facultad (Nombre, Descripcion, ubicacion) VALUES ('$nombre', '$descripcion', '$ubicacion')";
        
                    $sqli->query($my_query);
        
                    if($sqli->affected_rows>0){
                        echo "Registro exitoso";
                    }
                    else{
                        echo "Error al registrar";
                    }

        
            }
            else{

                if(isset($_POST['id'])){
                    $id=$_POST['id'];
        
                $my_query = "Select *FROM Facultad WHERE id='$id'";
    
                $result=$sqli->query($my_query);
    
                if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                    echo "Datos: ".$row['Nombre']." ".$row['Descripcion']." ".$row['Ubicacion'];
                }
                else{
                    echo "No se encontro el registro";
                }
                
                }
                else{
                    $nombreb=$_POST['nombreb'];
        
                    $my_query = "Select *FROM Facultad WHERE Nombre='$nombreb'";
        
                    $result=$sqli->query($my_query);
        
                    if($result->num_rows>0){
                      
                        while($row=$result->fetch_assoc()){
                            echo "Datos: ".$row['Nombre']." ".$row['Descripcion']." ".$row['Ubicacion']."<br>";
                        }
                       
                    }
                    else{
                        echo "No se encontro el registros";
                    }
                    break;
                }
               
            }

            
         
        }



?>

