<?php

require_once 'pdo.php';

try {
    # code...
    $tableName = 'products';

    $productId = 3;

    // câu truy vấn thường
    $sql = "DELETE FROM $tableName
            WHERE id = :id;
            ";

    $stmt = $conn->prepare($sql); // chuẩn bị câu truy vấn

    $stmt->bindParam(':id', $productId);

    $stmt->execute(); // thực hiện câu truy vấn

    // fecthAll để lấy ra dữ liệu
    // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
    die;
}