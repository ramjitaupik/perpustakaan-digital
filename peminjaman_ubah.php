<h1 class="mt-4">Pengembalian</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php 
            $id=$_GET['id'];
                if(isset($_POST['submit'])){
                    $id_buku = $_POST['bukuID'];
                    $id_user = $_SESSION['user']['userID'];
                    $tanggal_peminjaman = date('Y-m-d');
                    $tanggal_pengembalian = date('Y-m-d', strtotime($tanggal_peminjaman. '+7 days'));
                    $status_peminjaman = $_POST['status'];
                    $query = mysqli_query($koneksi,"UPDATE peminjaman set bukuID='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status='$status_peminjaman' WHERE peminjamanID=$id");

                    if($query){
                        echo '<script> alert("Ubah Data Berhasil."); location.href="?page=peminjaman_petugas";</script>';
                    }else{
                        echo '<script> alert("Ubah Data Gagal."); </script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman WHERE peminjamanID=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="bukuID" class="form-control">
                                <?php 
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while($buku = mysqli_fetch_array($buk)){
                                ?>
                                <option <?php if($buku['bukuID'] == $data['bukuID']) echo 'selected';?> value="<?php echo $buku['bukuID'];?>"><?php echo $buku['judul'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
        <div class="row mb-3">
            <div class="col-md-2">Status Peminjaman</div>
            <div class="col-md-8">
                <select name="status" class="form-control">
                    <option value="kembali"<?php if($data['status'] == 'kembali') echo'selected';?>>dikembalikan</option> 
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
            </div>
        </div>
       </form>
    </div>
    </div>
    </div>
</div>