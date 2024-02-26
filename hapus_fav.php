<?php
$id = $_GET['id'];

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE koleksiID=$id");
    return mysqli_affected_rows($koneksi);
}
if (hapus($id)>0){
    echo "<script>
            alert('Hapus favorit berhasil');
            location.href = 'index.php?page=favorit';
          </script>";
}
 
?>