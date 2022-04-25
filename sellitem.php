<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    // echo "connected successfully, now we will show the items id";
    $id = $_POST["id"];
    $userID = $_POST["userID"];

    $sql = "SELECT price FROM items WHERE  id='" . $id . "';";

    $result = mysqli_query($con,$sql) or die("2: name check query failed");

    if(mysqli_num_rows($result) > 0){
        $itemPrice = $result->fetch_assoc()["price"];

        $sql2 = "DELETE FROM inventory WHERE  itemID='" . $id . "' AND userID='" . $userID . "';";

        $result2=mysqli_query($con,$sql2);
        if($result2){
            $sql3 = "UPDATE `players` SET `coins`= coins + '" . $itemPrice . "' WHERE `id`= '" . $userID . "';";
            mysqli_query($con,$sql3);
        }
        else{
            echo "error: couldnot delete item";
        }
    }
    else{
        echo "0";
    }
    $con->close();
?>