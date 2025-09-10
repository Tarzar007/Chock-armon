<?php
require_once '../server/server.php';
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
                $insert_user = $db->prepare("INSERT INTO tbl_employee 
                (img,name,sur_name,nick_name,tell,birth_day,address,duty,salary,start_day,admin) 
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
                    header("Location: ../user.php");
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
