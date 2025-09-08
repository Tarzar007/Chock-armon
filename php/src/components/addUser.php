<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/from.css">
    <?php include 'map.html' ?>
    <title>เพิ่มพนักงาน</title>
</head>

<body>
    <form action="../controller/insert_user.php" method="post" enctype="multipart/form-data">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-8">
                    <input class="form-control form-control-lg" name="txt_file" type="file" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_name" type="text" placeholder="ชื่อ" required>
                </div>
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_lname" type="text" placeholder="นามสกุล" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_nickname" type="text" placeholder="ชื่อเล่น" required>
                </div>
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_phone" type="text" placeholder="เบอร์โทร" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_brithday" type="date" placeholder="วันเกิด (ว/ด/ป)" required>
                </div>
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_addree" type="text" placeholder="ที่อยู่" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_duty" type="text" placeholder="ตำแหน่ง" required>
                </div>
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_salary" type="text" placeholder="เงินเดือน" required>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_start_day" type="text" placeholder="เริ่มงานวันที่ (ว/ด/ป)" required>
                </div>
                <div class="col-4">
                    <input class="form-control form-control-lg" name="txt_admin" type="text" placeholder="ผู้บันทึก" required>
                </div>
            </div>
            <br>
            <div class="btn-container">
                <button class="btn btn-success" name="btn_submit" type="submit">ยืนยัน</button>
                <!-- <a href="../user.php" class="btn btn-danger">ย้อนกลับ</a> -->
            </div>

        </div>
    </form>
</body>

</html>