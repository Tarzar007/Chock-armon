<?php require_once('../models/server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โชคอมร</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <?php include 'dashboad.php' ?>
    <div class="control-button">
        <a href="expenses.php" class="btn btn-danger btn-control">รายจ่าย</a>
        <a href="chackBalance.php" class="btn btn-success btn-control">เช็คยอด</a>
    </div>
    <?php include '../components/modal.php' ?>
    <div class="date-submit">
        <input style="padding: 10px;width: 20%;" type="date">
        <button class="btn btn-primary">ค้นหา</button>
    </div>
    <div class="table-container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>วันที่</th>
                    <th>รายได้ทั้งหมด</th>
                    <th>รายจ่ายทั้งหมด</th>
                    <th>รายได้สุทธิ</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $select_sum = $conn->prepare("SELECT date_time, SUM(total_income) AS total_income, SUM(total_expenses) AS total_expenses, SUM(profit) AS profit FROM ( SELECT DATE(date_income) AS date_time, SUM(price_income) AS total_income, 0 AS total_expenses, SUM(price_income) AS profit FROM tbl_income GROUP BY DATE(date_income) UNION ALL SELECT DATE(date_expen) AS date_time, 0 AS total_income, SUM(expen_price) AS total_expenses, -SUM(expen_price) AS profit FROM tbl_expenses GROUP BY DATE(date_expen) ) AS combined GROUP BY date_time ORDER BY date_time DESC;");
                $select_sum->execute();
                $row = $select_sum->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <td><?php echo $row['date_time'] ?></td>
                    <td><?php echo $row['total_income'] ?></td>
                    <td><?php echo $row['total_expenses'] ?></td>
                    <td><?php echo $row['profit'] ?></td>

                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>