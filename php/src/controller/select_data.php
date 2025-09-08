<?php
require_once '../server/server.php';

if (isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    $select_user = $db->prepare("SELECT * FROM tbl_user WHERE user_id = :user_id "); // ตรวจสอบว่ามีรูปภาพหรือไม่
    $select_user->bindParam(':user_id', $userId);
    $select_user->execute();
    $userData = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($userData['img']) {
        $userData['img'] = base64_encode($userData['img']);
    }
    header("Content-Type: application/json");
    echo json_encode($userData);
}
