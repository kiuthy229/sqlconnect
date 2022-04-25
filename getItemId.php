<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    // echo "connected successfully, now we will show the items id";
    $userID = $_POST["userID"];

    $sql = "SELECT itemID, quantity FROM inventory WHERE  userID='" . $userID . "';";

    $result = mysqli_query($con,$sql) or die("2: name check query failed");

    if(mysqli_num_rows($result) > 0){
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
            // echo "itemID:".$row['itemID'] . "|quantity:".$row['quantity'] . ";";
        }
        echo json_encode($rows);
    }
    else{
        echo "0";
    }
    $con->close();
?>