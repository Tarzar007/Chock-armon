<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
require_once '../server/server.php';
function displaySuccessAlert($message)
{
    echo "<script>
           var audio = new Audio('../assets/chaeck.mp3'); 
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
if (isset($_POST['btn_candy'])) {
    $name_candy = $_POST['txt_candy'];
    $pice_candy = $_POST['candy_pice'];

    if (empty($pice_candy)) {
        $errorMsg = "ใส่ราคา";
    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_pice = $db->prepare("INSERT INTO tbl_income (type,income) VALUES (:type_candy,:candy)");
                $insert_pice->bindParam(':type_candy', $name_candy);
                $insert_pice->bindParam(':candy', $pice_candy);
                $insert_pice->execute();
                if ($insert_pice) {
                    $message = "ข้อมูลถูกบันทึกเรียบร้อย!";
                    displaySuccessAlert($message);
                    header("refresh:1; url=../candy.php");
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
