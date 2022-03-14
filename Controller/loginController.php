<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}else $action = "loginform";
switch ($action) {
    case 'login':
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['permission'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $_SESSION['permission'] = $_POST['permission'];
            if ($_POST['permission'] == "giaovien") {
                $gv = new Giaovien();
                $r = $gv->login($user, $pass);
                if ($r->rowCount() != 0) {
                    $set = $r->fetch();
                    $_SESSION['maGV'] = $set[0];
                    $_SESSION['tenGV'] = $set[1];
                    $_SESSION['username'] = $set[2];
                    $_SESSION['password'] = $set[3];
                    $_SESSION['role'] = $set[4];
                    // echo "
                    // <script>
                    //     alert('Đăng nhập thành công');
                    // </script>
                    // ";
                    echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
                }else {
                    unset($_SESSION['permission']);
                    unset($_POST['username']);
                    unset($_POST['password']);
                    unset($gv);
                    echo "
                    <script>
                        alert('Đăng nhập thất bại');
                    </script>
                    ";
                    echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
                }
            }else if ($_POST['permission'] == "sinhvien") {
                $hs = new HocSinh();
                $r = $hs->login($user,$pass);
                if ($r->rowCount() !=0) {
                    $set = $r->fetch();
                    $_SESSION['maHS'] = $set[0];
                    $_SESSION['tenHS'] = $set[1];
                    $_SESSION['diaChi'] = $set[2];
                    $_SESSION['dienThoai'] = $set[3];
                    $_SESSION['username'] = $set[4];
                    $_SESSION['password'] = $set[5];
                    $_SESSION['maLop'] = $set[6];
                    // echo "
                    // <script>
                    //     alert('Đăng nhập thành công');
                    // </script>
                    // ";
                    echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
                }else {
                    unset($_SESSION['permission']);
                    unset($_POST['username']);
                    unset($_POST['password']);
                    unset($gv);
                    echo "
                    <script>
                        alert('Đăng nhập thất bại');
                    </script>
                    ";
                    echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
                }
            }
        }else{
            echo "
            <script>
                alert('Đăng nhập thất bại');
            </script>
            ";
            echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
        }
        break;
    case 'logout':
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['permission']);
        echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
        break;
}