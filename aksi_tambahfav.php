<?php
            if(isset($_GET['id'])){
              $id = $_GET['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM buku  WHERE bukuID='$id'");
                $data = mysqli_fetch_array($query);

                $id = $_SESSION['user']['userID'];
                $buku = $data['bukuID'];

                if($query){
                  mysqli_query($koneksi, "INSERT INTO koleksipribadi(userID, bukuID) VALUES ('$id','$buku')");
                  
                } 
            }
            ?>