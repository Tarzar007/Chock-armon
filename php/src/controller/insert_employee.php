<?php
require_once '../models/server.php';
if (isset($_POST['btn_submit'])) {
    if (isset($_FILES['txt_file']) && $_FILES['txt_file']['error'] === UPLOAD_ERR_OK) {
        $img_tmp_path = $_FILES['txt_file']['tmp_name'];
        $img_data = file_get_contents($img_tmp_path);
    } else {
        $img_data = null; // ถ้าไม่ได้อัพโหลดรูปภาพ
    }
    $name = $_POST['txt_name'];
    $lname = $_POST['txt_lname'];
    $nickname = $_POST['txt_nickname'];
    $tell = $_POST['txt_phone'];
    $birth_day = $_POST['txt_brithday'];
    $address = $_POST['txt_addree'];
    $duty = $_POST['txt_duty'];
    $salary = $_POST['txt_salary'];
    $start_day = $_POST['txt_start_day'];
    $admin = $_POST['txt_admin'];

    if (empty($name)) {
        $errorMsg = "ใส่ราคา";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_user = $conn->prepare("INSERT INTO tbl_employee 
                (img_employee,fristname_employee,surname_employee,nickname_employee,tel_employee,birth_employee,address_employee,duty_employee,sarary_employee,start_employee,admin_employee) 
                VALUES (:img,:name,:lname,:nname,:tell,:brith,:addr,:duty,:salary,:start,:admin)");
                $insert_user->bindParam(':img', $img_data, PDO::PARAM_LOB);
                $insert_user->bindParam(':name', $name);
                $insert_user->bindParam(':lname', $lname);
                $insert_user->bindParam(':nname', $nickname);
                $insert_user->bindParam(':tell', $tell);
                $insert_user->bindParam(':brith', $birth_day);
                $insert_user->bindParam(':addr', $address);
                $insert_user->bindParam(':duty', $duty);
                $insert_user->bindParam(':salary', $salary);
                $insert_user->bindParam(':start', $start_day);
                $insert_user->bindParam(':admin', $admin);
                $insert_user->execute();
                if ($insert_user) {
                    $_SESSION['succes'] = "เพิ่มข้อมูลสำเร็จ";
                    header("Location: ../View/employee.php");
                } else {
                    $_SESSION['warning'] = "เกิดข้อผิดพลาด";
                    // header("refresh:1; ./gasStation.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
