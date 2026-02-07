<?php require_once('../models/server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">

    <title>เช็คยอดขายรายวัน</title>
</head>
<style>
    .chart-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        margin-left: 5rem;
    }

    .chart1 {
        width: 400px;
        /* กำหนดความกว้างของกราฟที่เหมาะสม */
        height: auto;
        /* ความสูงจะปรับตามอัตราส่วนของความกว้าง */
    }
</style>


<body>

    <div class="card">
        <div class="card-container">
            <div class="date-submit">
                <input style="padding: 10px;width: 200px;" type="date">
                <button class="btn btn-primary">ค้นหา</button>
            </div>


        </div>
        <div class="chart-container">
            <div class="chart1">
                <canvas id="myChart"> </canvas>
            </div>
            <div class="chart1">
                <canvas id="myChart2"> </canvas>
            </div>

        </div>
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>รายได้น้ำมัน</th>
                        <th>รายได้วัสดุ</th>
                        <th>รายได้โรงน้ำ</th>
                        <th>รายได้ท้งหมด</th>
                        <th>รายจ่าย</th>
                        <th>รวมรายได้สุทธิ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_sum = $conn->prepare("SELECT
    date_time,
    SUM(total_income) AS total_income,
    SUM(total_expenses) AS total_expenses,
    SUM(profit) AS profit,
    (SELECT SUM(price_income) FROM tbl_income WHERE product_name='วัสดุและอุปกรณ์' AND DATE(date_income) = date_time) AS eq,
    (SELECT SUM(price_income) FROM tbl_income WHERE product_name IN ('น้ำแพ็ค', 'น้ำถัง') AND DATE(date_income) = date_time) AS water,
    (SELECT SUM(price_income) FROM tbl_income WHERE product_name IN ('เบนซิน91', 'เบนซิน95', 'ดีเซล') AND DATE(date_income) = date_time) AS gas
FROM (
    SELECT
        DATE(date_income) AS date_time,
        SUM(price_income) AS total_income,
        0 AS total_expenses,
        SUM(price_income) AS profit
    FROM
        tbl_income
    GROUP BY
        DATE(date_income)
    UNION ALL
    SELECT
        DATE(date_expen) AS date_time,
        0 AS total_income,
        SUM(expen_price) AS total_expenses,
        -SUM(expen_price) AS profit
    FROM
        tbl_expenses
    GROUP BY
        DATE(date_expen)
) AS combined
GROUP BY
    date_time
ORDER BY
    date_time DESC;
");
                    $select_sum->execute();
                    while ($row = $select_sum->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['date_time'] ?></td>
                            <td><?php echo $row['gas'] ?></td>
                            <td><?php echo $row['eq'] ?></td>
                            <td><?php echo $row['water'] ?></td>
                            <td><?php echo $row['total_income'] ?></td>
                            <td><?php echo $row['total_expenses'] ?></td>
                            <td><?php echo $row['profit'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js" integrity="sha512-fMPPLjF/Xr7Ga0679WgtqoSyfUoQgdt8IIxJymStR5zV3Fyb6B3u/8DcaZ6R6sXexk5Z64bCgo2TYyn760EdcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>