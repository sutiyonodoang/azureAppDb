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
                        </div><br>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="text" name="email" id="email" class="form-control" required="true">
                        </div><br>
                        <div class="form-group">
                            <label for="job">Job </label>
                            <input type="text" name="job" id="job" class="form-control" required="true">
                        </div><br>
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
                
                    include "conn.php";
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