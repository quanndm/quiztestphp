<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else if(isset($_POST['action'])){
    $action = $_POST['action'];
}else $action = "show";

switch ($action) {
    case 'show':
        include "./View/class/class.php";
        break;
    case 'addBtn':
        include "./View/class/addClass.php";
        break;
    case 'add':
        if (!empty($_POST['tenLop']) && !empty($_POST['siso'])) {
            $tenLop = $_POST['tenLop'];
            $siso = $_POST['siso'];

            $lop = new Lop();
            $lop->insertClass($tenLop, $siso);
            unset($_POST['tenLop']);
            unset($_POST['siso']);
            echo "
                <script>
                    alert('Thêm thành công');
                </script>
            ";
            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=class&action=show'/>";
        }else{
            echo "
                <script>
                    alert('vui long nhap thong tin');
                </script>
            ";
            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=class&action=addBtn'/>";
        }
        break;
    case 'editBtn':
        include "./View/class/editClass.php";
        break;
    case 'edit':
        if (!empty($_POST['tenLop']) && !empty($_POST['siso'])) {
            $maLop = $_POST['maLop'];
            $tenLop = $_POST['tenLop'];
            $siso = $_POST['siso'];
            $lop = new Lop();
            $lop->updateClass($maLop, $tenLop, $siso);
            unset($_POST['malop']);
            unset($_POST['tenLop']);
            unset($_POST['siso']);
            unset($lop);
            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=class&action=show'/>";
        }
        break;
    case 'back':
        echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=class&action=show'/>";
        break;
    case 'deleteBtn':
        if (isset($_GET['id'])) {
            $maLop = $_GET['id'];
            $lop = new Lop();
            $lop->deleteClass($maLop);
            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=class&action=show'/>";
        }
        break;
}