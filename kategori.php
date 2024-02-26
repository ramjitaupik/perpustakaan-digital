<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <a href="?page=kategori_tambah" class="btn btn-primary">+ Tambah Kategori</a>
        <table class="table table-flush" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
</thead>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td>
                    <a href="?page=kategori_ubah&&id=<?php echo $data['kategoriID'];?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda ingin menghapus data tersebut');" href="?page=kategori_hapus&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-danger">Hapus</a>
        </td>
        </tr>
            <?php
        }
        ?>

</table>
</div>
</div>