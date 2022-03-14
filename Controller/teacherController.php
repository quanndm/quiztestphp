<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
switch ($action) {
        // -----------------------------class & student--------------------------------
    case 'showAllClass':
        include "./View/teacher/qlhocsinh/lop.php";
        break;

    case 'backAllClass':
        echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showAllClass'/>";
        break;
        // học sinh
    case 'showStudent':
        include "./View/teacher/qlhocsinh/hocsinh.php";
        break;
    case 'addStudent':
        include "./View/teacher/qlhocsinh/addStudent.php";
        break;
    case 'addStudentBtn':
        if (isset($_POST['submit'])) {
            if (!empty($_POST['tenHS']) && !empty($_POST['diachi']) && !empty($_POST['dienthoai']) && !empty($_POST['malop'])) {
                $tenHS =  $_POST['tenHS'];
                $diachi = $_POST['diachi'];
                $dienthoai = $_POST['dienthoai'];
                $maLop = $_POST['malop'];

                //tao doi tuong
                $hs = new HocSinh();
                $hs->insertHocSinh($tenHS, $diachi, $dienthoai, $maLop);
                //unset cac bien
                unset($_POST['tenHS']);
                unset($_POST['diachi']);
                unset($_POST['dienthoai']);
                unset($_POST['malop']);
                //in thong bao
                echo "
                    <script>
                        alert('Thêm thành công');
                    </script>
                ";
                //tra ve trang 
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
            } else {
                $maLop = $_POST['malop'];
                echo "
                    <script>
                        alert('vui long nhap thong tin');
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=addStudent&maLop=$maLop'/>";
            }
        }
        break;
    case 'backStudent':
        $maLop = $_GET['id'];
        echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
        break;
    case 'editStudent':
        include "./View/teacher/qlhocsinh/editStudent.php";
        break;
    case 'editStudentBtn':
        if (isset($_POST['submit'])) {
            if (!empty($_POST['maHS']) && !empty($_POST['tenHS']) && !empty($_POST['diachi']) && !empty($_POST['dienthoai']) && !empty($_POST['malop'])) {
                $maHS = $_POST['maHS'];
                $tenHS =  $_POST['tenHS'];
                $diachi = $_POST['diachi'];
                $dienthoai = $_POST['dienthoai'];
                $maLop = $_POST['malop'];
                //tao doi tuong
                $hs = new HocSinh();
                $hs->updateHocSinh($maHS, $tenHS, $diachi, $dienthoai);
                //unset cac bien
                unset($_POST['maHS']);
                unset($_POST['tenHS']);
                unset($_POST['diachi']);
                unset($_POST['dienthoai']);
                unset($_POST['malop']);
                //in thong bao
                echo "
                    <script>
                        alert('Sửa thành công');
                    </script>
                ";
                //tra ve trang 
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
            }
        }
        break;
    case 'deleteStudent':
        if (isset($_GET['id'])) {
            $maHS = $_GET['id'];
            $maLop = $_GET['maLop'];
            $hs = new HocSinh();
            $hs->deleteHocsinh($maHS);
            echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
        }
        break;
    case 'addStudentExcelForm':
        $note = "excel";
        include "./View/teacher/qlhocsinh/addStudent.php";
        break;
        // ------- cần check lại-------------------------------------------------
    case 'addStudentExcel':
        if (isset($_POST['submit_file'])) {
            $maLop = $_POST['maLop'];
            $file = $_FILES['file']["tmp_name"];
            //remove utf-8 signature tu 1 file
            file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
            //mo file de doc nhung row tu csv

            if (($file_open = fopen($file, "r")) !== false) {
                $current = 0;
                //Tao doi tuong 
                $lop = new Lop();
                $hs = new HocSinh();
                $soLuongHocSinh = $lop->getSoHSbyClassID($maLop);
                while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                    $tenHS = trim($csv[0]);
                    $diaChi = trim($csv[1]);
                    $dienThoai = "0" . trim($csv[2]);

                    if ($current < $soLuongHocSinh) {

                        $hs->insertHocSinh($tenHS, $diaChi, $dienThoai, $maLop);
                        $current++;
                    } else {
                        echo "
                            <script>
                                alert('Vượt quá số lượng học sinh của lớp')
                            </script>
                        ";
                        echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
                        break;
                    }
                }
                fclose($file_open);
                echo "
                            <script>
                                alert('Thêm học sinh thành công')
                            </script>
                        ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
            } else {
                echo "
                    <script>
                        alert('Mở file thất bại')
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showStudent&id=$maLop'/>";
            }
        }
        break;

        // --------------------------------------------------------------------------
        //---------------------exam------------------------------ 
    case 'showExams':
        include "./View/teacher/qldethi/dethi.php";
        break;
    case 'addExam':
        include "./View/teacher/qldethi/addDethi.php";
        break;
    case 'addExamBtn':
        if (isset($_POST['submit_dethi'])) {

            if (!empty($_POST['maMon']) && !empty($_POST['soCauHoi']) && !empty($_POST['kichHoat']) && !empty($_POST['thoiGianTest'])  && !empty($_POST['maLop'])) {
                $maMon =  $_POST['maMon'];
                $soCauHoi = $_POST['soCauHoi'];
                $thoiGianTest = $_POST['thoiGianTest'];
                $kichHoat = $_POST['kichHoat'];
                $timeKichHoat = new DateTime($kichHoat);//note1 --start--Y
                $maGV = isset($_POST['maGV']) ? $_POST['maGV'] : $_SESSION['maGV'];
                $maLop = $_POST['maLop'];
                //tao doi tuong
                $de = new DeThi();
                // tạo cờ
                $flag = true;
                //kiem tra thoi gian tao de thi
                $listde = $de->getListDebyClassID($maLop);
                while ($set = $listde->fetch()) {
                    $timeBatDau = new DateTime($set['kichHoat']);//--A
                    if (
                        $timeBatDau == $timeKichHoat
                    ) {
                        $flag = false;
                        break;
                    }
                    unset($timeBatDau);
                }
                if ($flag != false) {
                    $de->insertDethi($maMon, $soCauHoi, $thoiGianTest, $kichHoat, $maGV, $maLop);
                    //in thong bao
                    echo "
                        <script>
                            alert('Thêm thành công');
                        </script>
                    ";
                    //tra ve trang 
                    echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showExams'/>";
                }else {
                    echo "
                        <script>
                            alert('Thời gian kiểm tra bị trùng');
                        </script>
                    ";
                    //tra ve trang 
                    echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showExams'/>";
                }
                // 

            } else {
                echo "
                    <script>
                        alert('vui long nhap thong tin');
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=addExam'/>";
            }
        }
        break;
    case 'backExam':
        echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showExams'/>";
        break;
    case 'editExam':
        include "./View/teacher/qldethi/editDethi.php";
        break;
    case 'editDethiBtn':
        if (isset($_POST['submit'])) {
            $maMon = $_POST['maMon'];
            $soCauHoi = $_POST['soCauHoi'];
            $thoiGianTest = $_POST['thoiGianTest'];
            $kichHoat = $_POST['kichHoat'];
            $maGV = $_POST['maGV'];
            $maLop = $_POST['maLop'];
            $maBD = $_POST['maBD'];

            $de = new DeThi();
            $de->updateDethi($maBD, $maMon, $soCauHoi, $thoiGianTest, $kichHoat, $maGV, $maLop);
            echo "
                <script>
                    alert('sua thanh cong');
                </script>
            ";
            echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showExams'/>";
        }
        break;
    case 'deleteExam':
        if (isset($_GET['id'])) {
            $maBD = $_GET['id'];
            $de = new DeThi();
            $de->deleteDethi($maBD);
            echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showExams'/>";
        }
        break;

    case 'showQuestion':
        include "./View/teacher/qldethi/qlcauhoi/cauhoi.php";
        break;
    case 'addQuestion':
        include "./View/teacher/qldethi/qlcauhoi/addCauhoi.php";
        break;
    case 'addQuestionBtn':
        if (isset($_POST['submit_question'])) {
            if (!empty($_POST['noiDung']) && !empty($_POST['dapAnA']) && !empty($_POST['dapAnB']) && !empty($_POST['dapAnC']) && !empty($_POST['dapAnD']) && !empty($_POST['ketqua']) && !empty($_POST['maBD'])) {
                $cauhoi = trim($_POST['noiDung']);
                $dapanA = trim($_POST['dapAnA']);
                $dapanB = trim($_POST['dapAnB']);
                $dapanC = trim($_POST['dapAnC']);
                $dapanD = trim($_POST['dapAnD']);
                $ketqua = trim($_POST['ketqua']);
                $maBD = trim($_POST['maBD']);
                //tao doi tuong
                $de = new DeThi();
                $de->insertCauhoi($cauhoi, $dapanA, $dapanB, $dapanC, $dapanD, $ketqua, $maBD);
                echo "
                    <script>
                        alert('them thanh cong')
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
            } else {
                $maBD = $_POST['maBD'];
                echo "
                    <script>
                        alert('Vui long nhap du lieu')
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=addQuestion&maBD=$maBD'/>";
            }
        }
        break;
    case 'addQuestionExcelForm':
        $note = "excel";
        include "./View/teacher/qldethi/qlcauhoi/addCauhoi.php";
        break;
    case 'addQuestionExcel':
        if (isset($_POST['submit_file'])) {
            $maBD = $_POST['maBD'];
            $maMon = $_POST['maMon'];
            $file = $_FILES['file']["tmp_name"];
            //remove utf-8 signature tu 1 file
            file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
            //mo file de doc nhung row tu csv

            if (($file_open = fopen($file, "r")) !== false) {
                $current = 0;
                //Tao doi tuong de thi
                $de = new DeThi();
                $soLuongCauHoi = $de->getSoCauHoi($maBD)[0];
                while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                    $noidung = htmlspecialchars(trim($csv[0]));
                    $dapAnA = htmlspecialchars(trim($csv[1]));
                    $dapAnB = htmlspecialchars(trim($csv[2]));
                    $dapAnC = htmlspecialchars(trim($csv[3]));
                    $dapAnD = htmlspecialchars(trim($csv[4]));
                    $ketqua = htmlspecialchars(trim(strtoupper($csv[5])));

                    if ($current < $soLuongCauHoi) {

                        $de->insertCauhoi($noidung, $dapAnA, $dapAnB, $dapAnC, $dapAnD, $ketqua, $maBD);
                        $current++;
                    } else {
                        echo "
                            <script>
                                alert('Vượt quá số câu hỏi của đề')
                            </script>
                        ";
                        echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
                        break;
                    }
                }
                fclose($file_open);
                echo "
                            <script>
                                alert('Thêm câu hỏi thành công')
                            </script>
                        ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
            } else {
                echo "
                    <script>
                        alert('Mở file thất bại')
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showExams'/>";
            }
        }
        break;
    case 'editQuestion':
        include "./View/teacher/qldethi/qlcauhoi/editCauhoi.php";
        break;
    case 'backQuestion':
        $maBD = $_GET['maBD'];
        $maMon = $_GET['maMon'];
        echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
        break;
    case 'editQuestionBtn':
        if (isset($_POST['submit_question'])) {
            if (!empty($_POST['noiDung']) && !empty($_POST['dapAnA']) && !empty($_POST['dapAnB']) && !empty($_POST['dapAnC']) && !empty($_POST['dapAnD']) && !empty($_POST['ketqua']) && !empty($_POST['maND'])) {
                $cauhoi = $_POST['noiDung'];
                $dapanA = $_POST['dapAnA'];
                $dapanB = $_POST['dapAnB'];
                $dapanC = $_POST['dapAnC'];
                $dapanD = $_POST['dapAnD'];
                $ketqua = $_POST['ketqua'];
                $maND = $_POST['maND'];

                $de = new DeThi();
                $de->updateCauhoi($cauhoi, $dapanA, $dapanB, $dapanC, $dapanD, $ketqua, $maND);
                $maBD = $_POST['maBD'];
                $maMon = $_POST['maMon'];
                echo "
                    <script>
                        alert('Sua thanh cong');
                    </script>
                ";
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
            } else {
                echo "
                    <script>
                        alert('Vui long nhap du lieu')
                    </script>
                ";
                $maBD = $_POST['maBD'];
                $maMon = $_POST['maMon'];
                echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
            }
        }
        break;
    case 'deleteQuestion':
        if (isset($_GET['id'])) {
            $maBD = $_GET['maBD'];
            $maMon = $_GET['maMon'];
            $maND = $_GET['id'];
            $de = new DeThi();
            $de->deleteCauHoi($maND,$maBD);
            unset($de);
            echo "<meta http-equiv='refresh' content='0; url=../index.php?controller=teacher&action=showQuestion&id=$maBD&maMon=$maMon'/>";
        }
        break;
    case 'showClass':
        include "./View/teacher/diemthi/lop.php";
        break;
    case 'showScoreStudent':
        include "./View/teacher/diemthi/diem.php";
        break;
}
