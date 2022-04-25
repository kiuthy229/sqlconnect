<?php

     $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

     if(mysqli_connect_errno()){
         echo "1: connection failed";
         exit();
     }
 
     $username = $_POST["name"];
     $password = $_POST["password"];

     $namecheckquery = "SELECT id, username, salt, hash, level, coins FROM players WHERE  username='" . $username . "';";

    $namecheck = mysqli_query($con, $namecheckquery) or die("2: name check query failed");
    if(mysqli_num_rows($namecheck) != 1){
        echo "5: either no user with name or more than 1";
        exit();
    }

    $existinginfo = mysqli_fetch_assoc($namecheck);
    $salt = $existinginfo["salt"];
    $hash = $existinginfo["hash"];

    $loginhash = crypt($password, $salt);
    if ($hash != $loginhash){
        echo "6: incorrect password";
        exit();
    }

    echo $existinginfo["id"];
    // echo "0\t" . $existinginfo["coins"] . "\t" . $existinginfo["level"];
?>