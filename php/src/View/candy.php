    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <?php
    require_once('./server/server.php');
    // ฟังก์ชันสำหรับแสดง SweetAlert2 แจ้งเตือน

    // delete
    if (isset($_GET['delete_candy'])) {
        $delete_id = $_GET['delete_candy'];
        $delete_candy = $db->prepare("DELETE FROM tbl_income WHERE income_id  = :id");
        $delete_candy->bindParam(':id', $delete_id);
        $delete_candy->execute();
        if ($delete_candy) {
            $message = "นี่คือข้อความแจ้งเตือน!";
            $message = "ลบข้อมูลสำเร็จ!";
            displaySuccessAlert($message);
            header("refresh:1; url=candy.php");
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ขนมและเคื่องดื่ม</title>
    </head>

    <body>
        <?php include 'navbar.php' ?>
        <div class="card">
            <div class="card-container">
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success button-submit" data-bs-toggle="modal" data-bs-target="#candy">
                                ระบุ
                            </button>
                        </div>
                        <?php include './components/modal_candy.php' ?>
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
                        <th>ค่าขนมและเครื่องดื่ม</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_candy = $db->prepare("SELECT * FROM tbl_income WHERE type = 'ขนมและน้ำ' ORDER BY date_income DESC ");

                    $select_candy->execute();

                    while ($row = $select_candy->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['date_income'] ?></td>
                            <td><?php echo $row['income'] ?> บ.</td>
                            <td><a href="?delete_candy=<?php echo $row['income_id']; ?>" class="btn btn-danger">ลบ</a></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </body>

    </html>