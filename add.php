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

        if(isset($_POST['submit'])) {
            if(empty($_POST['name'])) {
                $messageName = 'Vui lòng nhập tên cầu thủ';
                $err = true;
            }

            if(empty($_POST['age'])) {
                $messageAge = 'Vui lòng nhập tuổi cầu thủ';
                $err = true;
            }

            if(empty($_POST['country'])) {
                $messageCountry = 'Vui lòng nhập quốc tịch cầu thủ';
                $err = true;
            }

            if(empty($_POST['position'])) {
                $messagePosition = 'Vui lòng nhập vị trí cầu thủ';
                $err = true;
            }

            if(empty($_POST['salary'])) {
                $messageSalary = 'Vui lòng nhập lương cầu thủ';
                $err = true;
            }

            if(!$err) {
                include 'connect.php';
                $sql = "INSERT INTO cauthu(ten_cau_thu, tuoi, quoc_tich, vi_tri, luong)
                values ('".$_POST['name']."',
                        '".$_POST['age']."',
                        '".$_POST['country']."',
                        '".$_POST['position']."',
                        '".$_POST['salary']."');";

                if($result = $con -> query($sql)) {
                    echo "<h1>Thêm mới cầu thủ thành công</h1>";
                }else{
                    echo "<h1>Thêm thất bại</h1>";
                }

            }
        }
    ?>
    <form action="" method="post">
        <label for="name">nhập tên cầu thủ</label>
        <input type="text" name="name" id="name" placeholder="thanhphat">
        <p class="err"><?php echo $messageName ?></p>

        <label for="age">nhập tuổi cầu thủ</label>
        <input type="text" name="age" id="age" placeholder="18">
        <p class="err"><?php echo $messageAge ?></p>

        <label for="country">nhập quốc tịch cầu thủ</label>
        <input type="text" name="country" id="country" placeholder="vietnam">
        <p class="err"><?php echo $messageCountry ?></p>

        <label for="position">nhập vị trí cầu thủ</label>
        <input type="text" name="position" id="position" placeholder="tiendao">
        <p class="err"><?php echo $messagePosition ?></p>

        <label for="salary">nhập lương cầu thủ</label>
        <input type="text" name="salary" id="salary" placeholder="1000$">
        <p class="err"><?php echo $messageSalary ?></p>

        <button name="submit">Thêm</button>
    </form>
    <a href="index.php"><button>Trang chủ</button></a>  
</body>
</html>