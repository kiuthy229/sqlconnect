<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    // echo "connected successfully, now we will show the items id";
    $id = $_POST["id"];

    $path ="http://localhost/sqlconnect/Items/" . $id . ".png";
    //$sql = "SELECT image FROM items WHERE  id='" . $id . "';";

    $image =file_get_contents($path);

    echo $image;

    $con->close();
?>