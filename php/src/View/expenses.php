 <!-- sweetalert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <?php
    require_once('./server/server.php');
    // ฟังก์ชันสำหรับแสดง SweetAlert2 แจ้งเตือน
    function displaySuccessAlert($message)
    {
        echo "<script>
         var audio = new Audio('./assets/delete.mp3'); 
                            audio.play();
            $(document).ready(function(){
                Swal.fire({
                    title: '$message',
                    text: '',
                    icon: 'success',
                    timer: 2300,
                    showConfirmButton: false
                });
            });
          </script>";
    }
    // delete
    if (isset($_GET['delete_expen'])) {
        $delete_id = $_GET['delete_expen'];
        $delete_e = $db->prepare("DELETE FROM tbl_expen WHERE expen_id  = :id");
        $delete_e->bindParam(':id', $delete_id);
        $delete_e->execute();
        if ($delete_e) {
            $message = "ลบข้อมูลสำเร็จ!";
            displaySuccessAlert($message);
            header("refresh:1; url=expenses.php");
        }
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>บันทึกรายจ่าย</title>
 </head>
 <style>
     .container {
         margin: 5rem;
     }
 </style>

 <body>
     <?php include 'navbar.php' ?>
     <div class="container">
         <form action="./controller/insert_expen.php" method="POST">
             <div id="formfield">
                 <div class="row justify-content-center mb-4">
                     <div class="col-6">
                         <input require class="form-control form-control-lg" type="text" placeholder="รายการจ่าย" name="expen_name">
                     </div>
                     <div class="col-6">
                         <input require class="form-control form-control-lg" type="number" placeholder="ค่าใช้จ่าย" name="expen_amout">
                     </div>
                 </div>
             </div><br>
             <!-- <div class="action-button">
                <button type="button" id="addButton" class="btn btn-primary">+</button>
                <button style="float: right;" type="button" id="removeButton" class="btn btn-danger">-</button>
            </div> -->
             <input type="submit" name="btn_water" class="btn btn-success" id="submit" value="ยืนยัน">
         </form>
     </div>
     <div class="table-container">
         <table class="table table-hover">
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
                    $select_expen = $db->prepare("SELECT * FROM tbl_expen ORDER BY date_expen DESC ");

                    $select_expen->execute();

                    while ($row = $select_expen->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                     <tr>
                         <td><?php echo $row['date_expen'] ?></td>
                         <td><?php echo $row['expen_decription'] ?></td>
                         <td><?php echo $row['expen_price'] ?></td>
                         <td><a href="?delete_expen=<?php echo $row['expen_id']; ?>" class="btn btn-danger">ลบ</a></td>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
     <script src="./js/script.js"></script>
 </body>

 </html>