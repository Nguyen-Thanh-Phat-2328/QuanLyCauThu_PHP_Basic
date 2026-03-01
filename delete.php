<?php
    include 'connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM `cauthu` WHERE `id` = $id";
    // $result = $con -> query($sql);

    // $data = [];
    // if($result -> num_rows > 0) {
    //     while($row = $result -> fetch_assoc()) {
    //         $data[] = $row;
    //     }
    // }

    // print_r($data);

    if ($result = $con->query($sql)) {
        echo "<h1>Xóa cầu thủ thành công Click vào <a href='index.php'>đây</a> để về trang danh sách</h1>";
    }else{
        echo "<h1>Có lỗi xảy ra Click vào <a href='index.php'>đây</a> để về trang danh sách</h1>";
    }
?>