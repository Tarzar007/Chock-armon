<?php
session_start();
require_once('../models/server.php');
?>
<?php


if (isset($_GET['delete_expen'])) {
    $delete_id = $_GET['delete_expen'];
    $delete_gas = $conn->prepare("DELETE FROM tbl_expenses WHERE id_expenses  = :id");
    $delete_gas->bindParam(':id', $delete_id);
    $delete_gas->execute();
    if ($delete_gas) {
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
    <title>บันทึกรายจ่าย</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="card">
        <div class="card-container">
            <div class="container">
                <div class="container">
                    <form action="../controller/insert_expen.php" method="POST">
                        <div id="formfield">
                            <div class="row justify-content-center mb-4">
                                <div class="col-6">
                                    <input require class="form-control form-control-lg" type="text" required placeholder="รายการจ่าย" name="expen_name">
                                </div>
                                <div class="col-6">
                                    <input require class="form-control form-control-lg" type="number" required placeholder="ค่าใช้จ่าย" name="expen_amout">
                                </div>
                            </div>
                        </div><br>
                        <input type="submit" name="btn_expen" class="btn btn-success" id="submit" value="ยืนยัน">
                    </form>
                </div>
                <div class="table-container" style="width: 1000px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>รายการจ่าย</th>
                                <th>จำนวน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                        $select_expen = $conn->prepare("SELECT * FROM tbl_expenses ORDER BY date_expen DESC ");

                        $select_expen->execute();

                        while ($row = $select_expen->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['date_expen'] ?></td>
                                <td><?php echo $row['expen_decription'] ?></td>
                                <td><?php echo $row['expen_price'] ?></td>
                                <td><a href="?delete_expen=<?php echo $row['id_expenses']; ?>" class="btn btn-danger">ลบ</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        <?php
        if (isset($_SESSION['expen_success'])) {
            $message = $_SESSION['expen_success'];
            unset($_SESSION['expen_success']);
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
        <!-- bootstap5 -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>