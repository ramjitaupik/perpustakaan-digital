<h1 class="mt-3">Ulasan</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if(isset($_POST['submit'])){
                        $bukuID =$_POST['bukuID'];
                        $id_user = $_SESSION['user']['userID'];
                        $ulasan =$_POST['ulasan'];
                        $rating =$_POST['rating'];
                        $input = mysqli_query($koneksi, "UPDATE ulasanbuku set bukuID='$bukuID', userID ='$id_user', ulasan='$ulasan', rating='$rating'");
                                    
                        if(!empty($input)){
                            echo '<script>alert("Tambah ulasan berhasil"); location.href ="?page=ulasan";</script>';
                        }else{
                            echo '<script>alert("Tambah Ulasan gagal")</script>';
                        }
                        }
                        $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku WHERE ulasanID=$id");
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
                                        <option <?php if($data['bukuID'] == $buku['bukuID']) echo'selected'; ?> value="<?php echo $buku['bukuID'];?>"><?php echo $buku['judul'];?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Ulasan</div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" rows="5" name="ulasan"><?php echo $data['ulasan']; ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">Rating</div>
                                    <div class="col-md-8">
                                        <select name="rating" class="form-control">
                                            <?php
                                             for($i = 1; $i<=5; $i++){
                                                ?>
                                                <option><?php if($data['bukuID'] == $i) echo'selected'; ?><?php echo $i; ?></option>
                                                <?php
                                             }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                if($_SESSION['user']['level'] == 'pengguna'){
                                ?>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                    <a class="btn btn-info" href="?page=detail">Kembali</a>
                    <?php
                        }
                    ?>
                                
                                </div>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>