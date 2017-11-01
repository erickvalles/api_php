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


if(guardar($nombre,$descripcion,$conexion)){
    echo "OK!";
}else{
    echo "ERROR!";
}


function guardar($nombre, $desc, $conexion){

    $sql = "INSERT INTO lugars(nombre,descripcion) VALUES('$nombre','$desc')";

    if(mysqli_query($conexion,$sql)){
        return true;
    }else{
        return false;
    }

}