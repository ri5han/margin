<?php

    $conn=mysqli_connect('localhost','root','','margin');
    if(mysqli_connect_errno()) {
        echo "Error in DB";
    } else {
        echo "DB is connected";
    }

?>