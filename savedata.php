<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if (mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }

    $username = $_POST["name"];
    $newlevel = $_POST["level"];
    $newcoins = $_POST["coins"];

    $namecheckquery = "SELECT username FROM players WHERE username='" . $username . "';";

    $namecheck = mysqli_query($con, $namecheckquery) or die("2: name check query failed");
    if (mysqli_num_rows($namecheck) != 1){
        echo "5: either no user with name, or more than one";
        exit();
    }

    $updatequery = "UPDATE players SET coins = " . $newcoins . " WHERE username = '" . $username . "';";
    //$updatequery = "UPDATE players SET level = " . $newlevel . " WHERE username = '" . $username . "';";
    mysqli_query($con, $updatequery) or die ("7: save query failed");

    echo "0"
?>