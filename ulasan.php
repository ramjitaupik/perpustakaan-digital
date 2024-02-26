<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Ulasan</th>
            <th>Rating</th>
            <th>Aksi</th>

        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku LEFT JOIN user on user.userID = ulasanbuku.userID LEFT JOIN buku on buku.bukuID = ulasanbuku.bukuID");
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['ulasan']; ?></td>
                <td><?php echo $data['rating']; ?></td>
                    <td>
                        <?php
                            if($_SESSION['user']['level']=='pengguna'){
                            ?>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini??????');" href="?page=ulasan_hapus&&id=<?php echo $data['ulasanID']; ?>"class="btn btn-danger">Hapus</a>
                    <?php
                    }?>
                    </td>
            </tr>
            <?php
        }
        ?>
</table>
        </div>
        </div>
    </div>
</div>