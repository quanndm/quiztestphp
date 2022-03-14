<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else $action = "show";

switch ($action) {
    case 'show':
        include "./View/plan/plan.php";
        break;
    case 'addBtn':
        include "./View/plan/addPlan.php";
        break;
    case 'back':
        echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=plan&action=show'/>";
        break;
    case 'editBtn':
        include "./View/plan/editPlan.php";
        break;
    case 'add':
        if (isset($_POST['submit'])) {
            if (!empty($_POST['maLop'])  && !empty($_POST['maMon']) && !empty($_POST['maGV']) && !empty($_POST['maHocKy']) && !empty($_POST['maNamHoc'])) {
                $malop = $_POST['maLop'];
                $maMon = $_POST['maMon'];
                $maGV = $_POST['maGV'];
                $maHocKy = $_POST['maHocKy'];
                $maNamHoc = $_POST['maNamHoc'];
                
                //tao doi tuong, them du lieu
                $kehoach = new Kehoach();
                $kehoach->insertPlan($malop, $maMon, $maGV, $maHocKy,$maNamHoc);
                //unset cac bien
                unset($_POST['maLop']);
                unset($_POST['maMon']);
                unset($_POST['maGV']);
                unset($_POST['maHocKy']);
                unset($_POST['maNamHoc']);
                unset($kehoach);
                //in thong bao
                echo "
                    <script>
                        alert('Thêm thành công');
                    </script>
                ";
                //tra ve trang 
                echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=plan&action=show'/>";
            } else {
                echo "
                    <script>
                        alert('vui long nhap thong tin');
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=plan&action=addBtn'/>";
            }
        }
        break;

    case 'edit':
        if (!empty($_POST['maLop'])  && !empty($_POST['maMon']) && !empty($_POST['maGV']) && !empty($_POST['mahocKy']) && !empty($_POST['manamHoc']) && !empty($_POST['mlop'])  && !empty($_POST['mmon'])){
            //truoc chinh sua
            $mlop = $_POST['mlop'];
            $mmon = $_POST['mmon'];
            $mhk = $_POST['mhk'];
            $mnamhoc = $_POST['mnamhoc'];
            //sau chinh sua
            $maMon = $_POST['maMon'];
            $maGV = $_POST['maGV'];
            $mahocKy = $_POST['mahocKy'];
            $manamHoc = $_POST['manamHoc'];

            $kehoach = new Kehoach();
            // echo "
            //     <script>
            //         alert(`malopmoi: $malop \n mamonmoi: $maMon \n maGV: $maGV \n hocky: $hocKy \n namhoc: $namHoc \n malopcu: $mlop \n mamoncu: $mmon`);
            //     </script>
            // ";
            $kehoach->updatePlan($maMon, $maGV, $mahocKy, $manamHoc, $mlop, $mmon, $mhk, $mnamhoc);
            unset($$_POST['maLop']);
            unset($_POST['maMon']);
            unset($_POST['maGV']);
            unset($_POST['hocKy']);
            unset($_POST['namHoc']);
            unset($_POST['mlop']);
            unset($_POST['mmon']);
            unset($kehoach);
            echo "
            <script>
                alert('Sua thanh cong');
            </script>
            ";
            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=plan&action=show'/>";
    
        }
        break;
    case 'deleteBtn':
        if (!empty($_GET['maLop'])  && !empty($_GET['maMon']) && !empty($_GET['maHocky']) && !empty($_GET['manamhoc'])) {
            $maLop = $_GET['maLop'];
            $maMon = $_GET['maMon'];
            $maHocky = $_GET['maHocky'];
            $maNamHoc = $_GET['manamhoc'];
            
            $kehoach = new Kehoach();
            $kehoach->deletePlan($maLop, $maMon, $maHocky, $maNamHoc);
            echo "<meta http-equiv='refresh' content='0; url=../Admin/index.php?controller=plan&action=show'/>";
        }
        break;
}
