 <h1 class="mt-3">Detail Buku</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row m-4">
                            <?php
                                $id=$_GET['id'];
                                $judul=mysqli_query($koneksi, "SELECT * FROM buku JOIN kategoribuku on kategoribuku.kategoriID=buku.kategoriID WHERE bukuID='$id'"); 
                                while($buku=mysqli_fetch_array($judul)){
                            ?>
                            <div class="col text-center">
                  <img src="assets/img/<?php echo $buku['foto']; ?>" height="300">
                  </div>
                  <div class="col" >
                    <table class="table table-flush">
                                <tr>
                                    <td>kategori Buku</td>
                                    <td><?php echo $buku['nama_kategori']?></td>
                                </tr>
                                <tr>
                                    <td>Judul</td>
                                    <td><?php echo $buku['judul']?></td>
                                </tr>
                                <tr>
                                    <td>Penulis</td>
                                    <td><?php echo $buku['penulis']?></td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td><?php echo $buku['penerbit']?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td><?php echo $buku['tahun_terbit']?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><?php echo $buku['deskripsi']?></td>
                                </tr>
                        </div>
                            <tr>
                                <td></td>
                                <td><a class="btn btn-info" href="?page=buku&&id">Kembali</a>
                                </td>
                                <?php
                                if($_SESSION ['user']['level'] =='pengguna'){
                                ?>
                                <td>
                                <a class="btn btn-success" href="?page=ulasan_tambah&&id=<?php echo $buku['bukuID']?>">Ulasan</a>
                                </td>
                                <?php
                                }?>  
                                <?php
                                }?>  
                            </tr>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>
                            