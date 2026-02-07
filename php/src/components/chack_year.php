<?php require_once('../models/server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">

    <title>เช็คยอดขายรายปี</title>
</head>
<style>
    .chart-container {
        display: flex;
        justify-content: center;
        margin: 2rem;
    }

    .chart1 {
        width: 650px;
        /* กำหนดความกว้างของกราฟที่เหมาะสม */
        height: auto;
        /* ความสูงจะปรับตามอัตราส่วนของความกว้าง */
    }
</style>


<body>

    <div class="card">
        <div class="chart-container">
            <div class="chart1">
                <canvas id="myChart"> </canvas>
            </div>
            <!-- <div class="chart1">
                <canvas id="myChart2"> </canvas>
            </div> -->

        </div>
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>รายได้น้ำมัน</th>
                        <th>รายได้วัสดุ</th>
                        <th>รายได้โรงน้ำ</th>
                        <th>รายได้ร้านค้า</th>
                        <th>รวมรายได้</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>20 may 2023</td>
                        <td>1200</td>
                        <td>1200</td>
                        <td>1200</td>
                        <td>1200</td>
                        <td>1200</td>

                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
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