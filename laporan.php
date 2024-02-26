<?php
    include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="shortcut icon" href="assets/img/icon.jpg" type="image/x-icon">
</head>
<h1 align="center">Laporan Peminjaman</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <a href="cetak.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
            <table border="1"  width="100%" cellpadding="5" collspacing="0">
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Jumlah</th>
                </tr>
                <?php 
                $i = 0;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.userID = peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID");
                    while($data = mysqli_fetch_array($query)){
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $data['nama_lengkap']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                        </tr>
                        <?php
                    }?>
            </table>
        </div>
        </div>
    </div>
</div>
                </body>
                </html>