<h1 class="mt-3">Tambah Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            if(isset($_POST['submit'])){
                $kategoriID = $_POST['kategoriID'];
                $foto = $_POST ['foto'];
                $judul = $_POST ['judul'];
                $penulis = $_POST ['penulis'];
                $penerbit = $_POST ['penerbit'];
                $tahun_terbit = $_POST ['tahun_terbit'];
                $deskripsi = $_POST ['deskripsi'];
                $stok = $_POST ['stok'];
                
                $query = mysqli_query($koneksi, "INSERT INTO buku(kategoriID,foto,judul,penulis,penerbit,tahun_terbit,deskripsi,stok) values ('$kategoriID','$foto','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi','$stok')");

                if($query){
                    echo '<script>alert("Tambah Buku Berhasil."); location.href="?page=buku";</script>';
                } else{
                    echo '<script>alert("Tambah Buku Gagal");</script>';
                }
            }
            ?>
            <div class="row mb-3">
                <div class="col-md-2">Kategori Buku</div>
                <select name="kategoriID" class="form-control">
                    <?php
                    $kat = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                    while($kategori = mysqli_fetch_array($kat)){
                        ?>
                        <option value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['nama_kategori'];?></option>
                        <?php
                    }
                    ?>
                </select>
                </div>
                <div class="row mb-3">
                                    <div class="col-md-2">Judul</div>
                                    <input class="form-control"  type="text" name="judul"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Penulis</div>
                                    <input class="form-control"  type="text" name="penulis"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Penerbit</div>
                                    <input class="form-control"  type="text" name="penerbit"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Tahun Terbit</div>
                                    <input class="form-control"  type="text" name="tahun_terbit"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Deskripsi</div>
                                    <input class="form-control"  type="text" name="deskripsi"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Jumlah</div>
                                    <input class="form-control"  type="text" name="stok"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Foto</div>
                                    <input class="form-control"  type="file" name="foto"/>
                                </div>
                            </div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <a href="?page=buku" class="btn btn-info">Kembali</a>
            </div>
        </div>
    </div>
</form>
</main>
</div>
</div>