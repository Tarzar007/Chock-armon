<?php require_once('../models/server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    .control {
        display: flex;
        flex-direction: row;
        justify-content: center;
        margin: 6px;

    }
</style>

<body>
    <?php include 'navbar.php' ?>
    <br>
    <div class="control">
        <a href="chackBalance.php?p=chack_day" class="btn btn-secondary btn-control">รายวัน</a>
        <a href="chackBalance.php?p=chack_month" class="btn btn-success btn-control">รายเดือน</a>
        <a href="chackBalance.php?p=chack_year" class="btn btn-primary btn-control">รายปี</a>
    </div>

    <?php

    $p = (isset($_GET['p']) ? $_GET['p'] : '');
    if ($p == 'chack_day') {
        include('../components/chack_day.php');
    } elseif ($p == 'chack_month') {
        include('../components/chack_month.php');
    } elseif ($p == 'chack_year') {
        include('../components/chack_year.php');
    } else {
        include('../components/chack_day.php');
    }
    ?>
</body>

</html>