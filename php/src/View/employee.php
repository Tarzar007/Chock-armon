<?php
require_once('../models/server.php');
if (isset($_GET['user_id'])) {
    try {
        $id = $_GET['user_id'];
        $select_user = $db->prepare("SELECT * FROM tbl_user WHERE user_id = :user_id "); // ตรวจสอบว่ามีรูปภาพหรือไม่
        $select_user->bindParam(':user_id', $userId);
        $select_user->execute();
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

// delete
if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    $delete_user = $db->prepare("DELETE FROM tbl_user WHERE user_id  = :id");
    $delete_user->bindParam(':id', $delete_id);
    $delete_user->execute();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>ข้อมูลพนักงาน</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <?php include '../components/model_employee.php' ?>
    <div class="user-container">
        <div class="user-content">
            <a href="../components/addUser.php" target="_blank" class="btn btn-success btn-insert">เพิ่ม</a>
            <a href="../components/apply.php" target="_blank" class="btn btn-primary btn-insert">ใบสมัคร</a>
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รูปภาพ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>อายุ</th>
                        <th>วันที่เริ่มทำเงิน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_user = $conn->prepare("SELECT * FROM tbl_employee");

                    $select_user->execute();

                    while ($row = $select_user->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><img style="width: 50px; height: 50px;" src="data:image/jpeg;base64,<?php echo base64_encode($row['img_employee']); ?>" alt="User Image"></td>
                            <td><?php echo $row['fristname_employee']; ?></td>
                            <td><?php echo $row['surname_employee']; ?></td>
                            <td><?php echo $row['birth_employee']; ?></td>
                            <td><?php echo $row['start_employee']; ?></td>
                            <td>
                                <button class="btn btn-primary button" data-toggle="modal" data-target="#userModal" onclick="userDetail('<?php echo $row['id_employee'] ?>')" data-user-id="<?php echo $row['id_employee']; ?>">
                                    เพิ่มเติม
                                </button>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function userDetail(userId) {
            console.log(userId);
            $.ajax({
                url: "../controller/select_data.php",
                method: "post",
                dataType: 'json',
                data: {
                    id_employee: userId,
                },
                success: function(userData) {
                    console.log(userData);
                    $("#userImage").attr("src", "data:image/jpeg;base64," + userData.img_employee); // แสดงรูปภาพ
                    $("#userName").text("ชื่อ-นามสกุล : " + userData.fristname_employee + ' ' + userData.surname_employee);
                    $("#userNickName").text("ชื่อเล่น: " + userData.nickname_employee);
                    $("#userTell").text("เบอณ์โทร: " + userData.tel_employee);
                    $("#userAge").text("อายุ: " + userData.birth_employee);
                    $("#userAddree").text("ที่อยู่: " + userData.address_employee);
                    $("#userDuty").text("ตำแหน่ง: " + userData.duty_employee);
                    $("#userSalary").text("เงินเดือน: " + userData.sarary_employee);
                    $("#userStart").text("วันที่เริ่มทำงาน: " + userData.start_employee);
                    $("#userAdmin").text("ผู้บันทึก: " + userData.admin_employee);
                }
            });
        }


        $(document).ready(function() {
            $(".button").click(function() {
                var userId = $(this).data("user-id");
                userDetail(userId); // เรียกใช้ฟังก์ชั่น userDetail

                // เมื่อคลิกลบใน Modal
                $("#deleteUserBtn").click(function() {
                    if (confirm("คุณต้องการลบผู้ใช้นี้หรือไม่?")) {
                        window.location.href = "?delete_user=" + userId;
                    }
                });
            });
        });
    </script>

    <script script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</body>

</html>