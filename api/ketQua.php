<?php
include "../Model/connect.php";
include "../Model/ketqua.php";
include "../Model/dethi.php";

if(!empty(json_decode($_POST['mydata']))){
    // khai báo
    $obj = json_decode($_POST['mydata']);
    $arrayQuestionUser = $obj->arrayQuestionUser;
    $maBD = $obj->maBD;
    $maHS = $obj->maHS;
    $length = $obj->length;
    $maGV = $obj->maGV;
    $maMon = $obj->maMon;
    $maLop = $obj->maLop;
    $diem = 0;
    $soCauDung = 0;
    // Khởi tạo đối tượng
    $ketqua = new KetQua();
    $de = new DeThi();
    $res = $de->getCauHoi($maBD);
    // tính điểm, đếm số câu đúng
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        for($i = 0; $i<count($arrayQuestionUser); $i++){
            if ($row['maND'] === $arrayQuestionUser[$i]->id_cauhoi) {
                if ($row['ketQua'] == ($arrayQuestionUser[$i]->checked)) {
                    $diem += $row['diemMotCau'];
                    $soCauDung += 1;
                }
            }
        }
    }
    unset($de);
    unset($res);
    $de = new DeThi();
    $res = $de->getCauHoi($maBD);
    $arr = $res->fetchAll(PDO::FETCH_ASSOC);
    $diem = (($soCauDung === $length) ? 10 : $diem );
    $ketqua->insertKetQua($maLop,$maMon, $maBD, $maGV, $maHS,$soCauDung,$diem);
    $json = [
        "diem"=>$diem,
        "soCauDung"=>$soCauDung,
        "question"=>$arr,
    ];
    unset($ketqua);
    unset($de);
    unset($res);
    echo json_encode($json);
}
