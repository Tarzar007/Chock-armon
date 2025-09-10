<?php
session_start();
require_once('../models/server.php');
?>

<?php

if (isset($_GET['delete_gas'])) {
    $delete_id = $_GET['delete_gas'];
    $delete_gas = $conn->prepare("DELETE FROM tbl_income WHERE id_income = :id");
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
    <title>ปั้มน้ำมัน</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="card">
        <div class="card-container">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success button-submit" data-bs-toggle="modal" data-bs-target="#benzin1">
                            เบนซิน91
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn btn-warning button-submit" data-bs-toggle="modal" data-bs-target="#benzin2">
                            เบนซิน95
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger button-submit" data-bs-toggle="modal" data-bs-target="#gas">
                            ดีเซล
                        </button>
                    </div>
                    <?php include '../components/modal_diesel.php' ?>
                    <?php include '../components/modal_benzin91.php' ?>
                    <?php include '../components/modal_benzin95.php' ?>
                </div>
            </div>
        </div>
        <div class="date-submit">
            <input style="padding: 10px;width: 20%;" type="date">
            <button class="btn btn-primary">ค้นหา</button>
        </div>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>ชนิดน้ำมัน</th>
                        <th>ค่าน้ำมัน</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_gas = $conn->prepare("SELECT * FROM tbl_income WHERE product_name = 'เบนซิน95' OR product_name = 'เบนซิน91' OR product_name = 'ดีเซล' ORDER BY date_income DESC;");

                    $select_gas->execute();

                    while ($row = $select_gas->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['date_income'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td><?php echo $row['price_income'] ?> บ.</td>
                            <td><a href="?delete_gas=<?php echo $row['id_income']; ?>" class="btn btn-danger">ลบ</a></td>
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

    <!-- bootstap5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>