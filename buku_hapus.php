<?php
$id = $_GET['id'];

function hapus($id){
    global $koneksi;

    // Check for existing references in peminjaman table
    $result = mysqli_query($koneksi, "SELECT COUNT(*) FROM peminjaman WHERE bukuID=$id");
    $row = mysqli_fetch_array($result);

    if ($row[0] > 0) {
        // There are dependent records in peminjaman table
        return false;
    } else {
        // No dependent records, proceed with deletion
        mysqli_query($koneksi, "DELETE FROM buku WHERE bukuID=$id");
        return mysqli_affected_rows($koneksi) > 0;
    }
}

if(hapus($id)){
    echo "<script>
            alert('Hapus buku berhasil');
            location.href = 'index.php?page=buku';
          </script>";
} else {
    echo "<script>
            alert('Hapus buku gagal. Ada peminjaman terkait.');
            location.href = 'index.php?page=buku';
          </script>";
}
?>