<?php 
include "../Model/connect.php";
include "../Model/kehoach.php";
include "../Model/mon.php";
include "../Model/lop.php";
include "../Model/giaovien.php";

$idNamhoc = $idHocky= $idMonhoc =$idLophoc = "";
if (!empty($_POST['idnamhoc'])) {
    $idNamhoc = $_POST['idnamhoc'];
    $kh = new Kehoach();
    $hocky = $kh->getListHocKy();
    echo '<option value="">Chọn học kỳ</option>';
    while($set = $hocky->fetch()){
        echo '<option value="'.$set[0].'">'.$set[1].'</option>';
    }
    unset($kh);
}elseif (!empty($_POST['idhocky'])) {
    $idHocky = $_POST['idhocky'];
    $mon = new Mon();
    $r= $mon->getListMon();
    echo '<option value="">Chọn môn học</option>';
    while($set = $r->fetch()){
        echo '<option value="'.$set[0].'">'.$set[1].'</option>';
    }
    unset($mon);
}elseif (!empty(json_decode($_POST['mydata'])->idmonhoc)) {
    $obj = json_decode($_POST['mydata']);
    $idMonhoc = $obj->idmonhoc;
    $idHocky = $obj->idhocky;
    $idNamhoc =  $obj-> idnamhoc;
    $lop = new Lop();
    $r = $lop->getListClassPlan($idMonhoc,$idHocky, $idNamhoc);
    echo '<option value="">Chọn lớp học</option>';
    while($set = $r->fetch()){
        echo '<option value="'.$set[0].'">'.$set[1].'</option>';
    }
    unset($lop);
}elseif (!empty($_POST['idlophoc'])) {
    $idLophoc = $_POST['idlophoc'];
    $gv = new Giaovien();
    $r = $gv->getListGiaoVien();
    echo '<option value="">Chọn giáo viên</option>';
    while($set = $r->fetch()){
        echo '<option value="'.$set[0].'">'.$set[1].'</option>';
    }
}