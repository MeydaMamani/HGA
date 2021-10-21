<?php

$serverName = "172.16.0.230"; //serverName\instanceName
$connectionInfo = array( "Database"=>"BDhis_hga", "UID"=>"OEIT-JHON", "PWD"=>"minsa123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if($conn) {
     echo "";
     
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));

}

?>
