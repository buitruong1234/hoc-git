<?php

require_once 'pdo.php';

try {
    # code...
    $tableName = 'products';

    $sql = "SELECT * FROM $tableName"; // câu truy vấn thường

    $stmt = $conn->prepare($sql); // chuẩn bị câu truy vấn

    $stmt->execute(); // thực hiện câu truy vấn

    // fecthAll để lấy ra dữ liệu
    // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: 'Montserrat', 'Noto Sans KR', 'Malgun Gothic', '맑은 고딕', Dotum, '돋움', 'AppleGothic', 'Apple SD Gothic Neo', sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        thead {
            background-color: pink;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>img</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                foreach ($result as $row) {
                    $id    = $row['id'];
                    $name  = $row['name'];
                    $img   = $row['img'];
                    $price = $row['price'];

                    echo '
                        <tr>
                            <th>' . $id    . '</th>
                            <td>' . $name  . '</td>
                            <td>' . $img   . '</td>
                            <td>' . $price . '</td>
                        </tr>
                        ';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>