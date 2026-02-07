<?php 
session_start();
require_once('../models/server.php');
?>

    <?php
    // ฟังก์ชันสำหรับแสดง SweetAlert2 แจ้งเตือน
    
    // delete
    if (isset($_GET['delete_e'])) {
        $delete_id = $_GET['delete_e'];
        $delete_e = $db->prepare("DELETE FROM tbl_income WHERE income_id = :id");
        $delete_e->bindParam(':id', $delete_id);
        $delete_e->execute();
        if ($delete_e) {
             $_SESSION['delete'] = "ลบข้อมูลสำเร็จ!"; 
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <title>อุปกรณ์และวัสดุ</title>
    </head>

    <body>
        <?php include 'navbar.php' ?>
        <div class="card">
            <div class="card-container">
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success button-submit" data-bs-toggle="modal" data-bs-target="#equipment">
                                ระบุ
                            </button>
                        </div>
                        <?php include '../components/modal_equipment.php' ?>
                    </div>
                </div>
            </div>
            <div class="date-submit">
                <input style="padding: 10px;width: 20%;" type="date">
                <button class="btn btn-primary">ค้นหา</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>ค่าวัสดุ</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_gas = $conn->prepare("SELECT * FROM tbl_income WHERE product_name = 'วัสดุและอุปกรณ์' ORDER BY date_income DESC ");

                    $select_gas->execute();

                    while ($row = $select_gas->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['date_income'] ?></td>
                            <td><?php echo $row['price_income'] ?> บ.</td>
                            <td><a href="?delete_e=<?php echo $row['id_income']; ?>" class="btn btn-danger">ลบ</a></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
        </div>
               <?php
if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
    echo "<script>
        var audio = new Audio('../assets/chaeck.mp3'); 
        audio.play();
        Swal.fire({
            title: '$message',
            icon: 'success',
            timer: 2300,
            showConfirmButton: false
        });
    </script>";
}

if (isset($_SESSION['warning'])) {
    $message = $_SESSION['warning'];
    unset($_SESSION['warning']);
    echo "<script>
        Swal.fire({
            title: '$message',
            icon: 'warning',
            timer: 2300,
            showConfirmButton: false
        });
    </script>";
}
if (isset($_SESSION['delete'])) {
    $message = $_SESSION['delete'];
    unset($_SESSION['delete']);
    echo "<script>
     var audio = new Audio('../assets/chaeck.mp3'); 
        audio.play();
        Swal.fire({
            title: '$message',
            icon: 'success',
            timer: 2300,
            showConfirmButton: false
        });
    </script>";
}
?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </body>

    </html>