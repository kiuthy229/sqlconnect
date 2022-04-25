<?php
    $con = mysqli_connect('localhost', 'root', 'root', 'unityaccess', 3307);

    if(mysqli_connect_errno()){
        echo "1: connection failed";
        exit();
    }
    echo "connected successfully, now we will show the items";

    $sql = "SELECT username, level FROM players";

    $result = mysqli_query($con,$sql) or die("2: name check query failed");

    if(mysqli_num_rows($result) > 0){
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
            echo "username: " . $row["username"]. "- level: " . $row["level"]. "</br>";
        }
        echo json_encode($rows);
    }
    else{
        echo "0";
    }
    $con->close();
?>