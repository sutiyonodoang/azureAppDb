<?php

include "conn.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
    echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

$name = $_POST['name'];
$email = $_POST['email'];
$job = $_POST['job'];
                        
$tsql = "Insert into karyawan (name, email, job) values('$name', '$email', '$job')";
$stmt = sqlsrv_query( $conn, $tsql);

if( $stmt === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}

header('location:index.php');
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);

?>