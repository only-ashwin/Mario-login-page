<?php
    include 'connection.php';

    $response = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_table WHERE email = '$email' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $array = mysqli_fetch_array($result);

        if($array['password'] == $password){
            session_start();

            $_SESSION['set'] = 'done';
            $_SESSION['user_id'] = $array['id'];
            
            $response['error'] = false;
            $response['message'] = 'Login Successful';
        }
        else{
            $response['error'] = true;
            $response['message'] = 'Incorrect Password';
        }
    }
    else{
        $response['error'] = true;
        $response['message'] = 'Email not registered with us';
    }

    echo json_encode($response);

?>