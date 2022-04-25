<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    // echo "connected successfully, now we will show the items id";
    $id = 1;
    $userID = 2;

    $sql = "UPDATE inventory SET `quantity`= quantity -1 WHERE  itemID='" . $id . "' AND userID='" . $userID . "';";

    //$result=mysqli_query($con,$sql);
    if ($con->query($sql) === TRUE) {
        echo "used item";
        $sql2 = "SELECT quantity FROM inventory WHERE itemID='" . $id . "' AND userID='" . $userID . "';";
        $result2 = mysqli_query($con,$sql2) or die("2: name check query failed");
        while($row = $result2->fetch_assoc()) {
            if($row["quantity"] == "0"){
                $sql3 = "DELETE FROM inventory WHERE  itemID='" . $id . "' AND userID='" . $userID . "';";
                mysqli_query($con,$sql3);
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    

    $con->close();
?>