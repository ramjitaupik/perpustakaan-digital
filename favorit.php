<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Buku Favorit</h1>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <form method="post">
            <?php
            if(isset($_GET['id'])){
              $id = $_GET['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM buku  WHERE bukuID='$id'");
                $data = mysqli_fetch_array($query);

                $id = $_SESSION['user']['userID'];
                $buku = $data['bukuID'];
                $check_query = "SELECT COUNT(*) AS total FROM koleksipribadi WHERE userID = $id AND bukuID = $buku";
                $check_result = mysqli_query($koneksi, $check_query);
                $check_data = mysqli_fetch_assoc($check_result);

                if($check_data['total']> 0){
                  // jika buku sudah ada dalam koleksi, beri responns kepada pengguna
                  echo "<script>
                  alert('Buku sudah dalam ada dalam koleksi favorit anda');
                  location.href = 'index.php?page=favorit';
                </script>";
                } else {
                  //jika buku belum ada dalam koleksi, tambahkan buku ke koleksi favorit
                   $query = "INSERT INTO koleksipribadi(userID, bukuID) VALUES ('$id','$buku')";
                   mysqli_query($koneksi, $query);

                   //beri respons kepada pengguna bahwa buku telah ditambahkan ke favorit
                   echo "<script>
                  alert('Selamat anda berhasil menambahkan buku ke favorit');
                  location.href = 'index.php?page=favorit';
                </script>";
                }
            }
            ?>
          <div class="row m-4"> 
        <?php
        $query = mysqli_query($koneksi, "SELECT*FROM koleksipribadi JOIN buku on buku.bukuID = koleksipribadi.bukuID JOIN user on user.userID= koleksipribadi.userID");
        while($data = mysqli_fetch_array($query)){
            ?>
            <div class="card m-4" style="width: 14rem;">
            <img src="assets/img/<?php echo $data['foto'];?>" class="cart-img-top">
            <div class="card-body">
                <h5 class="cart-title"><?php echo $data['judul'];?></h5>
                <a class="btn btn-outline-secondary" href="?page=detail&&id=<?php echo $data['bukuID'];?>" class="btn btn-primary">Detail</a>
                <?php
                if($_SESSION['user']['level'] =='pengguna'){
                    ?>
                    <a class="btn btn-outline-success" href="?page=peminjaman_tambah&&id=<?php echo $data['bukuID']?>">Pinjam</a>
                    <a class="btn btn-outline-danger" href="?page=hapus_fav&&id=<?php echo $data['koleksiID']?>" onclick="return confirm('Apakah Anda Ingin Menghapus Buku Tersebut?')"><i class="fa fa-bookmark"></i></a>
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

            