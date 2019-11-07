<!DOCTYPE html>

<html>

<head>
    <title>CRUD PHP - SQL Server</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-primary btnTambahData" data-toggle="modal" data-target="#exampleModal" data-zurl="">Tambah Barang</button>
                <h1>Data Nama</h1>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col" width="200px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include "conn.php";
                        $conn = sqlsrv_connect( $serverName, $connectionInfo);
                        $tsql = "Select * From tsiswa";
                        $stmt = sqlsrv_query( $conn, $tsql);
                        do {
                  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

                                ?>
                            <tr>
                                <td>
                                    <?= $row['id'];?>
                                </td>
                                <td>
                                    <?= $row['nama'];?>
                                </td>
                                <td>
                                    <a href="" class="badge badge-primary badge-pill tampilModalUbah" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id'];?>" data-zurl="">Edit</a>
                                    <a href="hapus.php?id=<?= $row['id']; ?>" class="badge badge-primary badge-pill" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                            <?php
                            }
                        } while ( sqlsrv_next_result($stmt) );
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="simpan.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" name="id" id="id" class="form-control" required="true" disabled="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama </label>
                            <input type="text" name="nama" id="nama" class="form-control" required="true">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.btnTambahData').on('click', function() {
                $('#exampleModalLabel').html('Tambah Nama');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', 'simpan.php');
            });
            $('.tampilModalUbah').on('click', function() {
                $('#exampleModalLabel').html('Ubah Nama');
                $('.modal-footer button[type=submit]').html('Ubah Nama');
                $('.modal-body form').attr('action', 'update.php');
                const id = $(this).data('id');
                $.ajax({
                    url: 'getdata.php',
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        alert(data[0].id);
                        $('#id').val(data[0].id);
                        $('#nama').val(data[0].nama);
                    }
                });
            });
        })
    </script>
</body>
</html>