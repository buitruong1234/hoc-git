<?php

require_once 'pdo.php';

try {
    # code...
    $tableName    = 'products';

    $productName  = 'qua chuoi';
    $prodctImg    = '';
    $productPrice = '500';

    // câu truy vấn thường
    $sql = "INSERT INTO $tableName (name, img, price)
            VALUES (:name, :img, :price);
            ";

    $stmt = $conn->prepare($sql); // chuẩn bị câu truy vấn

    $stmt->bindParam(':name' ,  $productName);
    $stmt->bindParam(':img'  , $prodctImg);
    $stmt->bindParam(':price', $productPrice);

    $stmt->execute(); // thực hiện câu truy vấn

    // fecthAll để lấy ra dữ liệu
    // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
    die;
}