<?php

    include "connect.php";

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $sql = "SELECT * FROM t_user";
        $stmp = $conn->prepare($sql);
        $stmp->execute();
        $result = $stmp->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $method = $_REQUEST['method'];

        if($method == "POST"){
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $status = $_REQUEST['status'];
            $remark1 = '';
            $remark2 = '';
            $sql = "insert into t_user(Username,Password,Status,Remark1,Remark2) values('$username','$password','$status','$remark1','$remark2')";
            $stmp = $conn->prepare($sql);
            $stmp->execute();
    
            $sqlsel = "select * from t_user where Username = '$username' and Password = '$password' and Status = '$status'";
            $stmt = $conn->prepare($sqlsel);
            $stmt->execute();
            $result = $stmt->fetchAll();
    
            if(count($result) > 0){
                $data['callback'] = '1';
            }else{
                $data['callback'] = '0';
            }
    
            echo json_encode($data);
        }

        if($method == "PUT"){
            $idd = $_REQUEST['idd'];
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $status = $_REQUEST['status'];
            $remark1 = $_REQUEST['remark1'];
            $remark2 = $_REQUEST['remark2'];
    
            $sql = "UPDATE SET Username = '$username',Password = '$password',Status = '$status',Remark1 = '$remark1',Remark2 = '$remark2' WHERE ID = '$idd')";
            $stmp = $conn->prepare($sql);
            $stmp->execute();
    
            $sqlsel = "select * from t_user where Username = '$username' and Password = '$password' and Status = '$status'";
            $stmt = $conn->prepare($sqlsel);
            $stmt->execute();
            $result = $stmt->fetchAll();
    
            if(count($result) > 0){
                $data['callback'] = '1';
            }else{
                $data['callback'] = '0';
            }
    
            echo json_encode($data);
        }

        if($method == "DELETE"){
            $idd = $_REQUEST['idd'];
            $sql = "DELETE FROM t_user WHERE ID = '$idd'";
            $stmp = $conn->prepare($sql);
            $stmp->execute();
    
            $sqlsel = "select * from t_user where ID='$idd'";
            $stmt = $conn->prepare($sqlsel);
            $stmt->execute();
            $result = $stmt->fetchAll();
    
            if(count($result) > 0){
                $data['callback'] = '0';
            }else{
                $data['callback'] = '1';
            }
    
            echo json_encode($data);
        }
       

    }

    