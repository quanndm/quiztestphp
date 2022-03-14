<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: Application/json");
include "../Model/connect.php";
include "../Model/dethi.php";

$made = (isset($_GET['maBD'])?$_GET['maBD']:null);
if ($made == null||$made<=0) {
    echo json_encode(array("status"=>"fail"));
}else {
    $dethi = new DeThi();
    $random = (isset($_GET['random'])?true:false);
    if ($random == false) {
        $res = $dethi->getCauHoi($made);
        echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
    }else {
        $res = $dethi->getCauHoiRandom($made);
        echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
    }
}
