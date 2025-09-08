<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar -->
    <div class="w3-top navbar">
        <div class="w3-bar  w3-card  nav-main">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large  w3-large " href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">หน้าหลัก</a>
            <a href="gasStation.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">ปั้มน้ำมัน</a>
            <a href="equipment.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">อุปกรณ์-วัสดุ</a>
            <!-- <a href="candy.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">ขนม-เครื่องดื่ม</a> -->
            <a href="water.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">โรงน้ำ</a>
            <a href="user.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">พนักงาน</a>
            <a href="../login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large ">ออกจากระบบ</a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block  w3-hide w3-hide-large w3-hide-medium w3-large nav-small">
            <a href="index.php" class="w3-bar-item w3-button w3-padding-large">หน้าหลัก</a>
            <a href="gasStation.php" class="w3-bar-item w3-button w3-padding-large">ปั้มน้ำมัน</a>
            <a href="equipment.php" class="w3-bar-item w3-button w3-padding-large">อุปกรณ์-วัสดุ</a>
            <!-- <a href="candy.php" class="w3-bar-item w3-button w3-padding-large">ขนม-เครื่องดื่ม</a> -->
            <a href="water.php" class="w3-bar-item w3-button w3-padding-large">โรงน้ำ</a>
            <a href="user.php" class="w3-bar-item w3-button w3-padding-large">พนักงาน</a>
            <a href="../login.php" class="w3-bar-item w3-button w3-padding-large">ออกจากระบบ</a>
        </div>
    </div>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>