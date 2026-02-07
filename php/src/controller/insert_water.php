<?php
session_start();
require_once '../models/server.php'; // เชื่อม DB

if (isset($_POST['btn_water'])) {
    $water_type = $_POST['water_select'];
    $water_price = $_POST['price'];
     $water_quantity = $_POST['quantity_water'];

     $water_sum = $water_price * $water_quantity;

    if (empty($water_type)) {
        $_SESSION['error'] = "กรุณาใส่ราคา";
        header("Location: ../View/gasStation.php");
        exit();
    } else {
        try {
            $insert_pice = $conn->prepare(
                "INSERT INTO tbl_income (product_name, price_income) VALUES (:namewater, :water)"
            );
            $insert_pice->bindParam(':namewater', $water_type);
            $insert_pice->bindParam(':water', $water_sum);
            $insert_pice->execute();

            if ($insert_pice) {
                $_SESSION['success'] = "ข้อมูลถูกบันทึกเรียบร้อย!";
                header("Location: ../View/water.php");
                exit();
            } else {
                $_SESSION['warning'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
                header("Location: ../View/water.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['warning'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
            header("Location: ../View/water.php");
            exit();
        }
    }
}
