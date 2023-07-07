<?php

    include 'connection.php';

    session_start();

    if(isset($_SESSION['set']) && $_SESSION['set'] == 'done'){

        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM user_table WHERE id = '$user_id' ";
        $result = mysqli_query($conn, $query);
        $array = mysqli_fetch_array($result);

        echo "Welcome ".$array['username'];
    }
    else
    {
        echo "You are not authorized";
    }

?>