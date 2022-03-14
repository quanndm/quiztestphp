<!-- echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php'/>"; -->
<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else if(isset($_POST['action'])){
    $action = $_POST['action'];
}else $action = "home";
switch ($action) {
    case 'home':
        include "./View/home.php";
        break;
}