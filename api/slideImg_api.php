<?php

    include "connect.php";

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $sql = "SELECT * FROM t_slideimg";
        $stmp = $conn->prepare($sql);
        $stmp->execute();
        $result = $stmp->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $method = $_REQUEST['method'];

        if($method == "POST"){
            $title = $_REQUEST['title'];
            $category = $_REQUEST['category'];
            $img_url = $_REQUEST['file'];
            $remark1 = '';
            $remark2 = '';
            $sql = "insert into t_slideimg(Title,Category,Img_url,Remark1,Remark2) values('$title','$category','$img_url','$remark1','$remark2')";
            $stmp = $conn->prepare($sql);
            $stmp->execute();
    
            $sqlsel = "select * from t_slideimg where Title = '$title' and Category = '$category'";
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
            $sql = "DELETE FROM t_slideimg WHERE ID = '$idd'";
            $stmp = $conn->prepare($sql);
            $stmp->execute();
    
            $sqlsel = "select * from t_slideimg where ID='$idd'";
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

    