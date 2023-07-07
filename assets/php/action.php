<?php
    include 'connection.php';

    $name = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_table WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        echo "Email already registered";

    }else{

        $query = "INSERT INTO user_table (username, email, mobile, state, password) VALUES ('$name', '$email', '$mobile', '$state', '$password')";
        $result = mysqli_query($conn, $query);

        if($result){

            echo "Data inserted";

        }else{

            echo "Data not inserted";
            
        }
        

    }
    
?>