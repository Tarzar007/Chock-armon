<?php
session_start();
require_once '../models/server.php'; // เชื่อม DB

if (isset($_POST['btn_gas'])) {
    $name_gas = $_POST['txt_benzin95'];
    $pice_gas = $_POST['gas_pice'];

    if (empty($pice_gas)) {
        $_SESSION['error'] = "กรุณาใส่ราคา";
        header("Location: ../View/gasStation.php");
        exit();
    } else {
        try {
            $insert_pice = $conn->prepare(
                "INSERT INTO tbl_income (product_name, price_income) VALUES (:namegas, :gas)"
            );
            $insert_pice->bindParam(':namegas', $name_gas);
            $insert_pice->bindParam(':gas', $pice_gas);
            $insert_pice->execute();

            if ($insert_pice) {
                $_SESSION['success95'] = "ข้อมูลถูกบันทึกเรียบร้อย!";
                header("Location: ../View/gasStation.php");
                exit();
            } else {
                $_SESSION['warning95'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
                header("Location: ../View/gasStation.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['warning95'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
            header("Location: ../View/gasStation.php");
            exit();
        }
    }
}
