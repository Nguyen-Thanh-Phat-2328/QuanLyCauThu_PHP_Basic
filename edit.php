<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .err {
            color: red;
        }
    </style>
    <?php
    $messageName = $messageAge = $messageCountry = $messagePosition = $messageSalary = '';
    $err = false;

    $id = $_GET['id'];
    include 'connect.php';

    $sql = "SELECT * FROM `cauthu` WHERE `id` = $id";
    $result = $con->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['name'])) {
            $messageName = 'Vui lòng nhập tên cầu thủ';
            $err = true;
        }

        if (empty($_POST['age'])) {
            $messageAge = 'Vui lòng nhập tuổi cầu thủ';
            $err = true;
        }

        if (empty($_POST['country'])) {
            $messageCountry = 'Vui lòng nhập quốc tịch cầu thủ';
            $err = true;
        }

        if (empty($_POST['position'])) {
            $messagePosition = 'Vui lòng nhập vị trí cầu thủ';
            $err = true;
        }

        if (empty($_POST['salary'])) {
            $messageSalary = 'Vui lòng nhập lương cầu thủ';
            $err = true;
        }

        if (!$err) {
            include 'connect.php';
            $sql = "UPDATE `cauthu` SET
                `ten_cau_thu` = '" . $_POST['name'] . "',
                `tuoi` = '" . $_POST['age'] . "',
                `quoc_tich` = '" . $_POST['country'] . "',
                `vi_tri` = '" . $_POST['position'] . "',
                `luong` = '" . $_POST['salary'] . "' WHERE `id` = '" . $_GET['id'] . "'";

            if ($result = $con->query($sql)) {
                echo "<h1>Chỉnh sửa thông tin cầu thủ thành công Click vào <a href='index.php'>đây</a> để về trang danh sách</h1>";
            } else {
                echo "<h1>Có lỗi xảy ra Click vào <a href='index.php'>đây</a> để về trang danh sách</h1>";
            }
        }
    }
    ?>
    <form action="" method="post">
        <label for="name">nhập tên cầu thủ</label>
        <input type="text" name="name" id="name" value="<?php echo $data['ten_cau_thu'] ?>">
        <p class="err"><?php echo $messageName ?></p>

        <label for="age">nhập tuổi cầu thủ</label>
        <input type="text" name="age" id="age" value="<?php echo $data['tuoi'] ?>">
        <p class="err"><?php echo $messageAge ?></p>

        <label for="country">nhập quốc tịch cầu thủ</label>
        <input type="text" name="country" id="country" value="<?php echo $data['quoc_tich'] ?>">
        <p class="err"><?php echo $messageCountry ?></p>

        <label for="position">nhập vị trí cầu thủ</label>
        <input type="text" name="position" id="position" value="<?php echo $data['vi_tri'] ?>">
        <p class="err"><?php echo $messagePosition ?></p>

        <label for="salary">nhập lương cầu thủ</label>
        <input type="text" name="salary" id="salary" value="<?php echo $data['luong'] ?>">
        <p class="err"><?php echo $messageSalary ?></p>

        <button name="submit">Sửa</button>
    </form>
    <a href="index.php"><button>Trang chủ</button></a>
</body>

</html>