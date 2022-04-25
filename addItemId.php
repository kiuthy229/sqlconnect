<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    $id = $_POST["id"];
    $itemID = $_POST["itemID"];
    // echo "connected successfully, now we will show the items id";

    $sql = "SELECT quantity FROM inventory WHERE  `userID`= '" . $id . "' AND `itemID`='" . $itemID . "';";

    $result = mysqli_query($con,$sql) or die("2: name check query failed");
    
    if(mysqli_num_rows($result)>0){
        //echo mysqli_num_rows($result);
        $sql2 = "UPDATE `inventory` SET `quantity`= quantity +1 WHERE `userID`= '" . $id . "' AND `itemID`='" . $itemID . "';";
        if ($con->query($sql2) === TRUE) {
            echo "update item";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    else{
        $sql3 = "INSERT INTO `inventory` (`userID`, `itemID`, `quantity`) VALUES (" . $id . "," . $itemID . " ,1)";
        if ($con->query($sql3) === TRUE) {
            echo "insert item";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    $con->close();
?>