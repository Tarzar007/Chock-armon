<?php
 require_once('../models/server.php') ;
// count total price_gas
$query = "SELECT DATE_FORMAT(day, '%Y-%m-%d') AS formatted_day, total_gas FROM ( SELECT DATE(date_income) AS day, SUM(price_income) AS total_gas FROM tbl_income WHERE product_name = 'เบนซิน95' OR product_name = 'เบนซิน91' OR product_name = 'ดีเซล' GROUP BY day ORDER BY day DESC LIMIT 1 ) AS subquery;";
$stmt = $conn->prepare($query);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $rows['total_gas'];
$total_day = $rows['formatted_day'];

// count total price_equipment
$query = "SELECT DATE_FORMAT(day, '%Y-%m-%d') AS formatted_day, total_equipment FROM ( SELECT DATE(date_income) AS day, SUM(price_income) AS total_equipment FROM tbl_income WHERE product_name = 'วัสดุและอุปกรณ์' GROUP BY day ORDER BY day DESC LIMIT 1 ) AS subquery1;";
$stmt = $conn->prepare($query);
$stmt->execute();
$rows1 = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows1 = $rows1['total_equipment'];


// count total price_water
$query = "SELECT DATE_FORMAT(day, '%Y-%m-%d') AS formatted_day, total_water FROM ( SELECT DATE(date_income) AS day, SUM(price_income) AS total_water FROM tbl_income WHERE product_name = 'น้ำแพ็ค' OR product_name = 'น้ำถัง' GROUP BY day ORDER BY day DESC LIMIT 1 ) AS subquery3;";
$stmt = $conn->prepare($query);
$stmt->execute();
$rows3 = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows3 = $rows3['total_water'];

// count total price_sum
$query = "SELECT 
    DATE(date_income) AS daysum,
    SUM(price_income) AS total_sum
FROM tbl_income
GROUP BY DATE(date_income)
ORDER BY daysum DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$rowsday = $stmt->fetch(PDO::FETCH_ASSOC);
$total_day = $rowsday['total_sum'];


// count total price_sum
$query = "SELECT SUM(price_income) AS total_sum
          FROM tbl_income
          WHERE DATE(date_income) = CURDATE()";
$stmt = $conn->prepare($query);
$stmt->execute();
$rowsum = $stmt->fetch(PDO::FETCH_ASSOC);
$total_today = $rowsum['total_sum'] ;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style1.css">
</head>


<body>
    <div class="w3-row-padding w3-margin-bottom container-dahs">
        <div class="w3-quarter panel">
            <div class="w3-container w3-red w3-padding-16 quarter">

                <h4>รายได้จากน้ำมันวันนี้ </h4>
                <div class="w3-right" style="margin-right: 12px;">
                    <h3><?php echo $rows['total_gas'] ?> บาท</h3>
                </div>
                <div class="decription"><a class="a-link" href="./gasStation.php">รายละเอียด</a> </div>
            </div>
        </div>
        <div class="w3-quarter panel">
            <div class="w3-container w3-blue w3-padding-16 quarter">
                <h4>รายได้จากน้ำดื่มวันนี้</h4>
                <div class="w3-right" style="margin-right: 12px;">
                        <h3><?php echo $rows3['total_water'] ?> บาท</h3>
                </div>
                <div class="decription"><a class="a-link" href="./water.php">รายละเอียด</a> </div>
            </div>
        </div>
        <div class="w3-quarter panel">
            <div class="w3-container w3-teal w3-padding-16 quarter">
                <h4>รายได้จากวัสดุ-อุปกรณ์วันนี้</h4>
                <div class="w3-right" style="margin-right: 12px;">
                       <h3><?php echo $rows1['total_equipment']; ?> บาท</h3>
                </div>
                <div class="decription"><a class="a-link" href="./equipment.php">รายละเอียด</a> </div>
            </div>
        </div>
          <div class="w3-quarter panel">
            <div class="w3-container w3-amber w3-padding-16 quarter">
                <h4>รายได้รวมวันนี้</h4>
                <div class="w3-right" style="margin-right: 12px;">
                       <h3><?php echo $rowsday['total_sum']; ?> บาท</h3>
                </div>
                <div class="decription"><a class="a-link" href="./equipment.php">รายละเอียด</a> </div>
            </div>
        </div>
    </div>
</body>

</html>