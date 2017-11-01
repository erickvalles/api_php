<?php
/**
 * Created by PhpStorm.
 * User: Erick
 * Date: 31/10/2017
 * Time: 09:40 PM
 */
include "conex.php";


consulta(5,$conexion);

function consulta($id,$conexion){
    $sql = "SELECT * FROM participantes WHERE id_carrera = '$id'";

    $res = mysqli_query($conexion,$sql);
    $response = array();
    while($a = mysqli_fetch_array($res)){
        $persona = array('id'=>$a['codigo'],'nombre'=>$a['nombre']);
        array_push($response,$persona);
    }

    echo json_encode($response);
}