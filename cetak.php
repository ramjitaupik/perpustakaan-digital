<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%" >
    <tr>
    <th>NO</th>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Jumlah</th>
    </tr>
    <?php 
    include "koneksi.php";
    $i = 0;
        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.userID = peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID");
        while($data = mysqli_fetch_array($query)){
            $i++;
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['tanggal_peminjaman']; ?></td>
                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
            </tr>
            <?php
        }
    ?>
</table>
<script>
    window.print();
    setTimeout(function(){
        window.close();
    },10);
</script>