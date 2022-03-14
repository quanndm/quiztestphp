<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}else $action = 'xemDe';
switch ($action) {
    case 'xemdiem':
        include "./View/student/xemdiem.php";
        break;
    case 'xemDe':
        include "./View/student/kiemtra/addDe.php";
        break;
    case 'test':
        include "./View/student/kiemtra/kiemtra.php";
        break;
    // case 'addExam':
    //     if (isset($_POST['submit'])) {
    //         if (!empty($_POST['maBD'])) {
    //             $maBD = $_POST['maBD'];
    //             $maLop = $_POST['maLop'];
    //             $lop = new Lop();
    //             $r = $lop->getClassbyId($maLop);
    //             $tenlop = $r['tenLop'];
    //             if (add_exam($maBD, $maLop)== 1) {
    //                 add_exam($maBD, $maLop);
    //                 echo "
    //                 <script>
    //                     alert('Thêm bài kiểm tra tra thành công!');
    //                 </script>
    //                 ";
    //                 echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemDe'/>";
    //             }
    //             else if (add_exam($maBD, $maLop)== 2){
    //                 echo "
    //                 <script>
    //                     alert('Thêm bài kiểm tra tra thất bại!Học sinh lớp $tenlop không có bài kiểm tra này');
    //                 </script>
    //                 ";
    //                 echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemDe'/>";
    //             }
    //             else if (add_exam($maBD, $maLop)== 0){
    //                 echo "
    //                 <script>
    //                     alert('Thêm bài kiểm tra tra thất bại!Bài kiểm tra đã được thêm');
    //                 </script>
    //                 ";
    //                 echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemDe'/>";
    //             }
                
    //         } else {
    //             echo "
    //                 <script>
    //                     alert('Thêm bài kiểm tra tra thất bại!Vui lòng nhập mã đề!');
    //                 </script>
    //             ";
    //             echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemDe'/>";
    //         }
    //     } else {
    //         echo "
    //             <script>
    //                 alert('Thêm bài kiểm tra tra thất bại!');
    //             </script>
    //         ";
    //         echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemDe'/>";
    //     }
    //     break;
    // case 'ketqua':
    //     if (isset($_POST['submit_test'])) {
    //         if (!empty($_POST['ketqua']) && !empty($_POST['soCauDung']) && !empty($_POST['maBD']) && !empty($_POST['maGV']) && !empty($_POST['maMon'])) {
    //             $ketqua = $_POST['ketqua'];
    //             $socaudung = $_POST['soCauDung'];
    //             $maBD = $_POST['maBD'];
    //             $maGV =$_POST['maGV'];
    //             $maMon = $_POST['maMon'];
    //             $maLop = $_SESSION['maLop'];
    //             $maHS = $_SESSION['maHS'];

    //             $kq = new KetQua();
    //             $kq->insertKetQua($maLop, $maMon, $maBD, $maGV, $maHS, $socaudung, $ketqua);
    //             echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=student&action=xemdiem'/>";
    //         }
    //     }
    //     break;
}
