<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "webi");

    if(mysqli_connect_error()){
        echo "Koneksi ke database tidak berjalan",mysqli_connect_error();
    }
?>