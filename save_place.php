<?php
/**
 * Created by PhpStorm.
 * User: Erick
 * Date: 01/11/2017
 * Time: 11:13 AM
 */

include "conex.php";

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$foto = 'images/'.basename($_FILES['imagen']['name']);


if(guardar($nombre,$descripcion,$foto,$conexion)){
    echo "OK!";
}else{
    echo "ERROR!";
}


function guardar($nombre, $desc,$foto, $conexion){

    $sql = "INSERT INTO lugars(nombre,descripcion,foto) VALUES('$nombre','$desc','$foto')";

    if(mysqli_query($conexion,$sql)){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],$foto))
            return true;
        else
            return false;
    }else{
        echo mysqli_error($conexion);
        return false;
    }

}