<!DOCTYPE html>

<html>

<head>
    <title>Dicoding - Azure Lanjutan - Submission 1</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                <h1>Register Here!</h1>
                <form action="simpan.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="text" name="email" id="email" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="job">Job </label>
                            <input type="text" name="job" id="job" class="form-control" required="true">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" >Submit</button>
                </div>
                </form>
            </div>
        </div>
              
        <h1>People Who Are Registered:</h1> 
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Job</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>

            <tbody>
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
                    $connectionInfo = array("UID" => "sutiyonodoang", "pwd" => "Sutiyono@270382", "Database" => "PustakaPublik", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0, "ReturnDatesAsStrings"=> true);
                    $serverName = "tcp:dicodingdbserver1.database.windows.net,1433";
                    $conn = sqlsrv_connect($serverName, $connectionInfo);


                    $tsql = "Select * From karyawan";
                    $stmt = sqlsrv_query( $conn, $tsql);
                    do {
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $row['name'];?></td>
                                <td><?= $row['email'];?></td>
                                <td><?= $row['job'];?></td>
                                <td><?= $row['tgl'];?></td>
                                <!-- <td><?php //$tgl=date_format($row['tgl'],"Y-m-d"); echo $tgl;?></td> -->
                            </tr>
                            <?php
                            }
                    } while ( sqlsrv_next_result($stmt) );
                    sqlsrv_close( $conn);
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>