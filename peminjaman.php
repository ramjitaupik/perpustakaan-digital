<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                <tr>
                    <th>NO</th>
                    <th>Id_Buku</th>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.userID = peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID WHERE peminjaman.userID=" . $_SESSION['user']['userID']);
                    while($data = mysqli_fetch_array($query)){
                
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['bukuID']; ?></td>
                            <td><?php echo $data['nama_lengkap']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td>
                                <?php
                                if($_SESSION['user']['level']!='pengguna'){
                                    ?>
                                <?php
                                if($data['status'] != 'kembali'){
                                ?>
                                <a href="?page=peminjaman_ubah&&id=<?php echo $data['peminjamanID']?>" class="btn btn-success">Kembali Buku</a>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                }?>
                                        </td>
                                    </tr>
                                    <?php
                                    }?>
                                </table>
        </div>
        </div>
    </div>
</div>