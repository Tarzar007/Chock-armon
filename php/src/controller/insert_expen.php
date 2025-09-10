<?php
session_start();
require_once '../models/server.php'; // เชื่อม DB

if (isset($_POST['btn_expen'])) {
    $name_expen = $_POST['expen_name'];
    $pice_expen = $_POST['expen_amout'];
    if (empty($name_expen)) {
        $_SESSION['error'] = "กรุณาใส่ราคา";
        header("Location: ../View/expenses.php");
        exit();
    } else {
        try {
            $insert_pice = $conn->prepare(
                "INSERT INTO tbl_expenses (expen_decription,expen_price) VALUES (:expen,:amout)"
            );
            $insert_pice->bindParam(':expen', $name_expen);
            $insert_pice->bindParam(':amout', $pice_expen);
            $insert_pice->execute();

            if ($insert_pice) {
                $_SESSION['expen_success'] = "ข้อมูลถูกบันทึกเรียบร้อย!";
                header("Location: ../View/expenses.php");
                exit();
            } else {
                $_SESSION['warning'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
                header("Location: ../View/expenses.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['warning'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
            header("Location: ../View/expenses.php");
            exit();
        }
    }
}
