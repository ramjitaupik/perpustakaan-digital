<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h1 mb-0 text-gray-800">Dashboard</h1>
    <?php
                if($_SESSION ['user']['level'] !='pengguna'){
                    ?>
    <a href="laporan.php"  class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50"></i>Laporan Peminjaman</a>
    <?php
                            }?>
</div>
    <div class="row">
         <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategoribuku"));
                    ?>
                    Total Kategori</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <?php
                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                        ?>
                        Total Buku</div>
                        <div class="card-footer d-flex align-items-center justify-content-between"> 

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <?php
                            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasanbuku"));
                            ?>
                            Total Ulasan</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">

                            </div>
                        </div>
                    </div>
                    <?php
                    if($_SESSION['user']['level']!='pengguna'){
                        ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                <?php
                                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                                ?>    
                                Total User</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>
                        </div>
                            <?php }else{
                                }
                                ?>
                                <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="200">Nama</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['nama_lengkap'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Level</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['level'];?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Tanggal Login</td>
                                        <td width="1">:</td>
                                        <td><?php echo date('d-m-y');?></td>
                                    </tr>
                                </table>
                            </div>
                            </div>

                            