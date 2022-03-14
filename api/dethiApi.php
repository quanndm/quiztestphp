<?php
include "../Model/connect.php";
include "../Model/lop.php";
if (!empty(json_decode($_POST['mydata'])->idmonhoc)) {
    $obj = json_decode($_POST['mydata']);
    $idMonhoc = $obj->idmonhoc;
    $idGV = $obj->idGV;
    $lop = new Lop();
    $r = $lop->getListClassConlai($idMonhoc, $idGV);
    echo '<option value="">Chọn lớp học</option>';
    while($set = $r->fetch()){
        echo '<option value="'.$set[0].'">'.$set[1].'</option>';
    }
    unset($lop);
}