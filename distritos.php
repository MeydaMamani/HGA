<?php
    require('abrir.php');
    $datos = $_GET['id'];
    // echo $datos;
    
    $resul_dist = "SELECT DISTINCT(Distrito) FROM MAESTRO_HIS_ESTABLECIMIENTO WHERE disa='ayacucho' AND Provincia='$datos' ORDER BY Distrito";
    $resul_dist = sqlsrv_query($conn, $resul_dist);
    while ($consulta = sqlsrv_fetch_array($resul_dist)){
        $distrito = $consulta['Distrito'];
        echo $distrito, ',';
    }
?>