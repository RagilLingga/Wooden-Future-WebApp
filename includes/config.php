<?php 
    /*Koneksi ke Database*/
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kurniaillahi";

    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connection)
    {
        die("Connection Failed : ".mysqli_connect_Error());
    }
?>