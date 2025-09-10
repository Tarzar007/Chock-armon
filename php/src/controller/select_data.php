<?php
require_once '../models/server.php';

if (isset($_POST['id_employee'])) {
    $userId = $_POST['id_employee'];
    $select_user = $conn->prepare("SELECT * FROM tbl_employee WHERE id_employee = :user_id "); // ตรวจสอบว่ามีรูปภาพหรือไม่
    $select_user->bindParam(':user_id', $userId);
    $select_user->execute();
    $userData = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($userData['img_employee']) {
        $userData['img_employee'] = base64_encode($userData['img_employee']);
    }
    header("Content-Type: application/json");
    echo json_encode($userData);
}
