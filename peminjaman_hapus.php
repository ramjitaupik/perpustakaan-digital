<?php 
     $id=$_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM peminjaman where peminjamanID=$id")
?>
<script>
    alert('Hapus data berhasil');
    location.href = "?page=ulasan";
</script>