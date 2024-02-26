<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php 
                    if(isset($_POST['submit'])){
                        $id_buku = $_POST['bukuID'];
                        $id_user = $_SESSION['user']['userID'];
                        $tanggal_peminjaman = date('Y-m-d');
                        $tanggal_pengembalian = date('Y-m-d', strtotime($tanggal_peminjaman. '+ 7 days'));
                        $status_peminjaman = $_POST['status'];
                        $jumlah = $_POST['jumlah'];
                        $query = mysqli_query($koneksi, "INSERT INTO peminjaman(bukuID, userID, tanggal_peminjaman, tanggal_pengembalian, status, jumlah) VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian','$status_peminjaman','$jumlah')");

                        if($query){
                            echo '<script> alert("Tambah Data Berhasil.");location.href="?page=peminjaman"; </script>';
                        }else{
                            echo '<script> alert("Tambah Data Gagal."); </script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                                <?php
                                $id = $_GET['id'];
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku WHERE bukuID=$id");
                                while($buku = mysqli_fetch_array($buk)){
                                ?>
                                <input type="hidden" class="form-control" name="bukuID" value="<?php echo $buku['bukuID'];?>">
                                <input type="text" class="form-control" name="bukuID" value="<?php echo $buku['judul'];?>" disabled>
                                <?php
                                }
                                ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="status" class="form-control">
                                <option value="pinjam">Dipinjam</option>
                                <option value="kembali">dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Jumlah</div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="jumlah" min="1" max="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
