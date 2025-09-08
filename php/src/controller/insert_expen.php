<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
require_once '../server/server.php';
function displaySuccessAlert($message)
{
    echo "<script>
           var audio = new Audio('../assets/cap.mp3'); 
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
if (isset($_POST['btn_water'])) {
    $name_expen = $_POST['expen_name'];
    $pice_expen = $_POST['expen_amout'];

    if (empty($name_expen)) {
        $errorMsg = "ใส่ราคา";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_pice = $db->prepare("INSERT INTO tbl_expen (expen_decription,expen_price) VALUES (:expen,:amout)");
                $insert_pice->bindParam(':expen', $name_expen);
                $insert_pice->bindParam(':amout', $pice_expen);
                $insert_pice->execute();
                if ($insert_pice) {
                    $_SESSION['succes'] = "เพิ่มข้อมูลสำเร็จ";
                    $message = "ข้อมูลถูกบันทึกเรียบร้อย!";
                    displaySuccessAlert($message);
                    header("refresh:1; url=../expenses.php");
                } else {
                    $_SESSION['warning'] = "เกิดข้อผิดพลาด";
                    // header("refresh:1; ./gasStation.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
