<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}else $action = "home";
switch ($action) {
    case 'home':
        if ($_SESSION['permission'] == "sinhvien") {
            // include "./View/student/home.php";
            echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemDe'/>";
        }else if ($_SESSION['permission'] == "giaovien") {
            include "./View/teacher/home.php";
        }
        break;
    
    default:
        # code...
        break;
}