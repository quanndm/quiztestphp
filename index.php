<?php
session_start();
// include "./Model/function.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
spl_autoload_register("myClassName");
function myClassName($className){
    $path = "./Model/";
    include $path.$className.".php";
}
//get controller
$controller = "home";
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else if (isset($_POST['controller'])) {
    $controller = $_POST['controller'];
}
//kiem tra dang nhap
if ($controller == "login" && $_GET['action'] == 'login') {
    include "./Controller/$controller" . "Controller.php";
}
if (!isset($_SESSION['username']) && !isset($_SESSION['permission'])) :
    include "./src/template/login.php";
else :
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trắc nghiệm online</title>
        <!-- css bootstrap -->
        <link rel="stylesheet" href="./src/lib/bootstrap-5.1.1-dist/css/bootstrap.min.css">
        <!-- jquery -->
        <script src="./src/js/jquery-3.6.0.min.js"></script>
        <!-- custom css -->
        <link rel="stylesheet" href="./src/style/home/style.css">
    </head>

    <body>
        <!-- header  -->
        <?php
        if ($_SESSION['permission'] == "sinhvien" && $_GET['action'] != "test") {
            include "./View/student/header.php";
        } else if ($_SESSION['permission'] == "giaovien") {
            include "./View/teacher/header.php";
        }
        ?>

        <!-- end header -->
        <div class="container" style="margin-bottom: 40px;">
            <?php
            include "./Controller/" . $controller . "Controller.php";
            ?>
        </div>
        <!-- footer -->
            <?php
            if ($_GET['action'] != "test"){
                include "./View/footer.php";
            }
            ?>
        <!-- end footer -->
        <!-- js bootstrap -->
        <script src="./src/lib/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
        <!-- custom js -->
    <?php
        endif;
    ?>
    </body>

    </html>