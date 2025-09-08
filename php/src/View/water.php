<?php 
session_start();
require_once('../models/server.php');
?>
 <?php
    if (isset($_GET['delete_water'])) {
        $delete_id = $_GET['delete_water'];
        $delete_water = $conn->prepare("DELETE FROM tbl_income WHERE id_income  = :id");
        $delete_water->bindParam(':id', $delete_id);
        $delete_water->execute();
        if ($delete_water) {
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <title>โรงน้ำ</title>
    </head>

    <body>
        <?php include 'navbar.php' ?>
        <div class="card">
            <div class="card-container">
                <div class="container">
                    <br>
                    <form action="../controller/insert_water.php" method="post">
                        <div class="row">
                            <select name="water_select" id="water_select" onchange="setPrice()">
                                <option value="น้ำแพ็ค">น้ำแพ็ค</option>
                                <option value="น้ำถัง">น้ำถัง</option>
                            </select>
                        </div>
                        <input type="hidden" id="price" name="price">
                        <div class="row">
                            <input type="text" required id="water" name="quantity_water" placeholder="จำนวน">
                            <input type="submit" name="btn_water" class="btn btn-success " id="submit" value="ยืนยัน">
                        </div>
                    </form>
                </div>
            </div>
<script>
function setPrice() {
    let product = document.getElementById("water_select").value;
    let priceInput = document.getElementById("price");

    if (product === "น้ำแพ็ค") {
        priceInput.value = 35; // ราคาน้ำแพ็ค
    } else if (product === "น้ำถัง") {
        priceInput.value = 12; // ราคาน้ำถัง
    }
}

// set default ตอนโหลดหน้า
window.onload = setPrice;
</script>

            <div class="date-submit">
                <input style="padding: 10px;width: 20%;" type="date">
                <button class="btn btn-primary">ค้นหา</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>ชนิดถัง/แพ็ค</th>
                        <th>ราคา</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_water = $conn->prepare("SELECT * FROM tbl_income WHERE product_name = 'น้ำแพ็ค' OR product_name = 'น้ำถัง' ORDER BY date_income DESC ");

                    $select_water->execute();

                    while ($row = $select_water->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['date_income'] ?></td>
                            <td><?php echo $row['product_name'] ?> </td>
                            <td><?php echo $row['price_income'] ?> บ.</td>
                            <td><a href="?delete_water=<?php echo $row['id_income']; ?>" class="btn btn-danger">ลบ</a></td>
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