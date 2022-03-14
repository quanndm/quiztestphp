<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else if(isset($_POST['action'])){
    $action = $_POST['action'];
}else $action = "show";;

switch ($action) {
    case 'show':
        include "./View/teacher/teacher.php";
        break;
    case 'addBtn':
        include "./View/teacher/addTeacher.php";
        break;
    case 'add':
        if (!empty($_POST['teacherName']) && !empty($_POST['userName']) && !empty($_POST['password'])) {
            $teacherName = $_POST['teacherName'];
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            //tao doi tuong, them du lieu
            $gv = new Giaovien();
            $gv->insertTeacher($teacherName,$userName,md5($password));
            //unset cac bien
            unset($_POST['teacherName']);
            unset($_POST['userName']);
            unset($_POST['password']);
            unset($gv);
            //in thong bao
            echo "
                <script>
                    alert('Thêm thành công');
                </script>
            ";
            //tra ve trang 
            include "./View/teacher/teacher.php";
        }else{
            echo "
                <script>
                    alert('vui long nhap thong tin');
                </script>
            ";
            include "./View/teacher/addTeacher.php";
        }
        break;
    case 'editBtn':
        include "./View/teacher/editTeacher.php";
        break;
    case 'edit':
        if (!empty($_POST['maGv']) && !empty($_POST['tenGv']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $maGV = $_POST['maGv'];
            $tenGV = $_POST['tenGv'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $gv = new Giaovien();
            $gv->updateTeacher($maGV, $tenGV, $username, md5($password));
            unset($_POST['maGv']);
            unset($_POST['tenGv']);
            unset($_POST['username']);
            unset($_POST['password']);
            unset($gv);
            include "./View/teacher/teacher.php";
        }
        break;
    case 'back':
        echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=teacher&action=show'/>";
        break;
    case 'deleteBtn':
        if (isset($_GET['id'])) {
            $maGV = $_GET['id'];
            
            $gv = new Giaovien();
            $gv->deleteTeacher($maGV);

            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=teacher&action=show'/>";
        }
        break;
}