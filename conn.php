<?php

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:dicodingdbserver1.database.windows.net,1433; Database = PustakaPublik", "sutiyonodoang", "Sutiyono@270382");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "sutiyonodoang", "pwd" => "Sutiyono@270382", "Database" => "PustakaPublik", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:dicodingdbserver1.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


    // $serverName="DESKTOP-EA2V86B";
    // $uid = "sa";
    // $pwd = "Admin12345";
    // $connectionInfo = array( "UID"=>$uid,
    //                          "PWD"=>$pwd,
    //                          "Database"=>"EXAM",
    //                          "CharacterSet"=>"UTF-8");
    // $conn = sqlsrv_connect( $serverName, $connectionInfo);

    // if($conn){
    //     echo "Koneksi Berhasil";
    // }else{
    //     echo "koneksi gagal";
    // }




?>
