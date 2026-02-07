<?php
session_start();
require_once '../models/server.php'; // เชื่อม DB

if (isset($_POST['btn_e'])) {
      $name_eq = $_POST['txt_eq'];
    $pice_e = $_POST['equi_pice'];

    if (empty($name_eq)) {
        $_SESSION['error'] = "กรุณาใส่ราคา";
        header("Location: ../View/gasStation.php");
        exit();
    } else {
        try {
               $insert_pice = $conn->prepare("INSERT INTO tbl_income (product_name,price_income) VALUES (:name_eq,:equipment)");
                    $insert_pice->bindParam(':name_eq', $name_eq);
                    $insert_pice->bindParam(':equipment', $pice_e);
            $insert_pice->execute();

            if ($insert_pice) {
                $_SESSION['success'] = "ข้อมูลถูกบันทึกเรียบร้อย!";
                header("Location: ../View/equipment.php");
                exit();
            } else {
                $_SESSION['warning'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
                 header("Location: ../View/equipment.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['warning'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
             header("Location: ../View/equipment.php");
            exit();
        }
    }
}
