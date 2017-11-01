<?php
/**
 * Created by PhpStorm.
 * User: Erick
 * Date: 31/10/2017
 * Time: 09:40 PM
 */
include "conex.php";


consulta($_GET['q'],$conexion);

function consulta($id,$conexion){

    if($id > 0){
        $sql = "SELECT * FROM lugars WHERE id = '$id'";
    }else{
        $sql = "SELECT * FROM lugars";
    }



    $res = mysqli_query($conexion,$sql);
    if($res){

        $response = array();
        while($a = mysqli_fetch_array($res)){

            $lugar = array('id'=>$a['id'],'nombre'=>utf8_encode($a['nombre']),'descripcion'=>utf8_encode($a['descripcion']));
            array_push($response,$lugar);
        }


        echo json_encode($response);
    }
    else{
        echo "Error:".mysqli_error($conexion);
    }
}