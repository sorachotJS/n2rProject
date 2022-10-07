<?php
    include 'connect.php';
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $sql = "select * from t_user where Username = '$username' and Password = '$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if(count($result) > 0){
        $data['loginStatus'] = '1';
    }else{
        $data['loginStatus'] = '0';
    }
    echo json_encode($data);