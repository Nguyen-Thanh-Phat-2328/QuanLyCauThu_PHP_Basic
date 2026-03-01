<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table {
            width: 800px;
        }

        h1, table {
            margin: 10px auto;
            text-align: center;
        }

        tr, td, th {
            padding: 10px 20px;
            border: 1px solid #000;
        }

        #button {
            float: right;
            margin: 2px;
            margin-right: 10px;
        }
    </style>

    <?php
        include 'connect.php';

        $sql = "SELECT * FROM cauthu";

        $result = $con -> query($sql);

        $data = [];
        if($result -> num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
                $data[] = $row;
            }  
        }
    ?>

    <table>
        <h1>Quản lý cầu thủ</h1>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên cầu thủ</th>
                <th>Tuổi</th>
                <th>Quốc tịch</th>
                <th>Vị trí</th>
                <th>Lương</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['ten_cau_thu'] ?></td>
                            <td><?php echo $value['tuoi'] ?></td>
                            <td><?php echo $value['quoc_tich'] ?></td>
                            <td><?php echo $value['vi_tri'] ?></td>
                            <td><?php echo $value['luong'] ?></td>
                            <td><a href="edit.php?id=<?php echo $value['id'] ?>">edit</a></td>
                            <td><a href="delete.php?id=<?php echo $value['id'] ?>">delete</a></td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8"><a href="add.php"><button id="addButton">Thêm cầu thủ</button></a></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>