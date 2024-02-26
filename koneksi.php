<?php
    session_start();
    $koneksi = mysqli_connect('localhost','root','','ukk_2024');
    if(!$koneksi){
        die("gagal".mysqli_connect_error());
    }
?>