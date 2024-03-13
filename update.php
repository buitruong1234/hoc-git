<?php

require_once 'pdo.php';

try {
    # code...
    $tableName    = 'products';

    $productName  = 'qua tao';
    $prodctImg    = '';
    $productPrice = '10';
    $productId    = 1;

    // câu truy vấn thường
    $sql = "UPDATE $tableName
            SET name  = :name,
                img   = :img,
                price = :price WHERE id  = :id;";

    $stmt = $conn->prepare($sql); // chuẩn bị câu truy vấn

    $stmt->bindParam(':name' ,  $productName);
    $stmt->bindParam(':img'  , $prodctImg);
    $stmt->bindParam(':price', $productPrice);
    $stmt->bindParam(':id'   , $productId);

    $stmt->execute(); // thực hiện câu truy vấn

    // fecthAll để lấy ra dữ liệu
    // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
    die;
}