<h1 class="mt-4">Ubah Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            $id = $_GET['id'];
            if(isset($_POST['submit'])){
                    $kategoriID = $_POST['kategoriID'];
                    $judul = $_POST ['judul'];
                    $penulis = $_POST ['penulis'];
                    $penerbit = $_POST ['penerbit'];
                    $tahun_terbit = $_POST ['tahun_terbit'];
                    $deskripsi = $_POST ['deskripsi'];
                    $foto = $_POST ['foto'];
                    $query = mysqli_query($koneksi, "UPDATE buku SET kategoriID='$kategoriID', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi', foto='$foto' WHERE bukuID=$id");
                if($query){
                    echo '<script>alert("Ubah Buku Berhasil."); location.href="?page=buku";</script>';
                } else{
                    echo '<script>alert("Ubah Buku Gagal");</script>';
                }
            }
            
            $query = mysqli_query($koneksi, "SELECT*FROM buku WHERE bukuID=$id");
            $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
            <div class="col-md-2">Kategori</div>
            <div class="col-md-8">
                <select name="kategoriID"class="form-control">
                    <?php
                    $kat = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                    while($kategori = mysqli_fetch_array($kat)){
                        ?>
                        <option <?php if ($kategori['kategoriID'] == $data['kategoriID']) echo 'selected';?> value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['nama_kategori'];?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['judul'];?>" class="form-control"  name="judul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['penulis'];?>" class="form-control"  name="penulis"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit'];?>" class="form-control"  name="penerbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['tahun_terbit'];?>" class="form-control"  name="tahun_terbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['deskripsi'];?>" class="form-control"   name="deskripsi"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Foto</div>
                        <div class="col-md-8"><input type="file" value="<?php echo $data['deskripsi'];?>" class="form-control"   name="foto"></div>
                    </div>
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=kategori" class="btn btn-danger">Kembali</a>
            </div>
            </div>
        </form>
        </div>
        </div>
</div>
</div>