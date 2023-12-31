<?php
require 'functionDosen/function.php';
$conn = mysqli_connect("localhost", "root", "", "db_jeki");

$result = mysqli_query($conn, "SELECT * FROM dosen");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- judul web -->
    <title>Halaman Admin</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- javascript -->
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/scripts.js"></script>
</head>

<body class="bg-body">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Institut Tekonologi Kyoto</a>
        </div>
    </nav>

    <!-- Main -->
    <div class="container col-xxl-8 px-4 py-3 bg-info">
        <div class="col-md-5 mb-1">
            <a class="btn btn-dark" href="index.php" role="button">Kembali</a>
        </div>
        <div class="row bg-danger">

            <div class="col-md-20 m-2 text-center">
                <h2 class="text-uppercase">Data Dosen</h2>
            </div>
        </div>

        <div class="row bg-primary justify-content-between">
            <div class="col-md-5 m-2">
                <a class="btn btn-danger text-left" href="tambahDsn.php" role="button">Tambah Dosen</a>
            </div>

            <div class="col-md m-2">
                <form class="d-flex" role="search" method="post">

                    <input class="form-control me-2" type="text" placeholder="Cari dosen" aria-label="Search" name="keyword" id="keyword">

                    <!-- <button class="btn btn-outline-success" type="submit" name="cari" id="golek">Cari</button> -->

                    <div class="clearfix loader">
                        <div class="spinner-border float-end" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                </form>
            </div>

        </div>


        <div id="container">
            <table class="table text-center">
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>NID</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Email</th>
                    <th>Pendidikan</th>
                    <th>Status</th>
                </tr>
                <?php $i = 1; ?>
                <?php while ($dosen = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td> <img src="img/<?= $dosen['gambar'] ?>" alt="gambar" width="100px"> </td>
                        <td><?= $dosen['nid'] ?></td>
                        <td><a href="tampilDsn.php?id=<?= $dosen["id"] ?>"><?= $dosen["nama"] ?></a></td>
                        <td><?= $dosen['prodi'] ?></td>
                        <td><?= $dosen['email'] ?></td>
                        <td><?= $dosen['pendidikan'] ?></td>
                        <td>
                            <a href="ubahDsn.php?id=<?= $dosen["id"] ?>"><i class="bi bi-pencil-square"></i></a> |
                            <a href="hapusDsn.php?id=<?= $dosen["id"] ?>" onclick="return confirm('Yakin?');"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </table>
        </div>
    </div>


    <!-- Javascript boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>