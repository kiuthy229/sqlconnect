<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    // echo "connected successfully, now we will show the items";
    $id = $_POST["id"];
    // $userID = $_POST["userID"];

    //$sql = "SELECT id, name, description, price FROM items WHERE  id='" . $id . "';";

    $sql = "SELECT items.id, items.name, items.description, items.price, inventory.quantity FROM items, inventory WHERE  items.id='" . $id . "';";
    $result = mysqli_query($con,$sql) or die("2: name check query failed");

    if(mysqli_num_rows($result) > 0){
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
            // echo "id:".$row['id'] . "|name:".$row['name'] . "|description:".$row['description'] . ";";
        }
        echo json_encode($rows);

    }
    else{
        echo "0";
    }
    $con->close();
?>