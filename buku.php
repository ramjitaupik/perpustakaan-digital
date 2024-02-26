    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Daftar Buku</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                    if($_SESSION['user']['level']!='pengguna'){
                ?>
                <a href="?page=buku_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Buku</a>
                <?php
            }?>
            </div>
           <div class="row m-4"> 
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategoribuku on buku.kategoriID = kategoribuku.kategoriID");
        while($data = mysqli_fetch_array($query)){
            ?>
            <div class="card m-4" style="width: 14rem;">
            <img src="assets/img/<?php echo $data['foto'];?>" class="cart-img-top">
            <div class="card-body">
                <h5 class="cart-title"><?php echo $data['judul'];?></h5>
                <a href="?page=detail&&id=<?php echo $data['bukuID'];?>" class="btn btn-primary">Detail</a>
                <?php
                if($_SESSION['user']['level'] =='pengguna'){
                    ?>
                    <a class="btn btn-outline-success" href="?page=peminjaman_tambah&&id=<?php echo $data['bukuID']?>">Pinjam</a>
                    <a href="?page=favorit&&id=<?php echo $data['bukuID']?>"><i class="fa fa-bookmark"></i></a>
                    <?php
                }?>
                <?php
                if($_SESSION ['user']['level'] !='pengguna'){
                    ?>
                    <a class="btn btn-outline-danger" href="?page=buku_hapus&&id=<?php echo $data['bukuID']?>" onclick="return confirm('Apakah Anda Ingin Menghapus Buku Tersebut?')">Delete</a>
                    <a class="btn btn-info" href="?page=buku_ubah&&id=<?php echo $data['bukuID']?>">Ubah</a>               
                                    <?php
                                    }?> 
                                    </div>
                                </div>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>  
            </main>     
        </div>

            