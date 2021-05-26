<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "iNotes_app";

    $conn = mysqli_connect($server,$user,$pass,$db);

    if(!$conn)
    {
        echo "connection to datbase failed!!!!";
    }
?>