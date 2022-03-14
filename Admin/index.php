<?php
    include "./Model/connect.php";
    include "./Model/lop.php";
    include "./Model/mon.php";
    include "./Model/kehoach.php";
    include "./Model/giaovien.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/lib/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/lib/boxicons-2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="./src/css/style.css">
</head>

<body>
    <!-- header -->
        <?php include "./View/header.php"; ?>
    <!-- end header -->

    <div class="container" style="background-color: #f4f6f9;">
        <?php
            $controller = isset($_GET['controller'])
                        ? $_GET['controller']
                        :(isset($_POST['controller'])
                        ? $_POST['controller']
                        : "teacher");
            include "./Controller/$controller"."Controller.php";
        ?>
    </div>
    <!-- js -->
    <script src="./src/lib/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>