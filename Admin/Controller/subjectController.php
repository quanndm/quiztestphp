<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else if(isset($_POST['action'])){
    $action = $_POST['action'];
}else $action = "show";
switch ($action) {
    case 'show':
        include "./View/subject/subject.php";
        break;
    case 'addBtn':
        include "./View/subject/addSubject.php";
        break;
    case 'add':
        if (!empty($_POST['maMon']) && !empty($_POST['tenMon'])) {
            $maMon = $_POST['maMon'];
            $tenMon = $_POST['tenMon'];
            //tao doi tuong, them du lieu
            $mon = new Mon();
            $mon->insertSubject($maMon, $tenMon);
            //unset cac bien
            unset($_POST['tenLop']);
            unset($_POST['siso']);
            unset($mon);
            //in thong bao
            echo "
                <script>
                    alert('Thêm thành công');
                </script>
            ";
            //tra ve trang 
            include "./View/subject/subject.php";
        }else{
            echo "
                <script>
                    alert('vui long nhap thong tin');
                </script>
            ";
            include "./View/subject/addSubject.php";
        }
        break;
    case 'editBtn':
        include "./View/subject/editSubject.php";
        break;
    case 'edit':
        if (!empty($_POST['maMon']) && !empty($_POST['tenMon'])) {
            $maMon = $_POST['maMon'];
            $tenMon = $_POST['tenMon'];
            $mon = new Mon();
            $mon->updateSubject($maMon, $tenMon);
            unset($_POST['maMon']);
            unset($_POST['tenMon']);
            unset($mon);
            include "./View/subject/subject.php";
        }
        break;
    case 'back':
        echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=subject&action=show'/>";
        break;
    case 'deleteBtn':
        if (isset($_GET['id'])) {
            $maMon = $_GET['id'];

            $mon = new Mon();
            $mon->deleteSubject($maMon);

            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=subject&action=show'/>";
        }
        break;
}