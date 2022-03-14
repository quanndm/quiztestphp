<?php

// function add_exam($maBD, $maLop)
// {
//     $de = new DeThi();
//     $mon = new Mon();
//     $r = $de->getDebyId($maBD);
//     $m = $mon->getSubjectbyId($r['maMon']);
//     // kiem tra hoc sinh da them de vao trang ca nhan chua
//     if (isset($_SESSION['exam'][$maBD])) {
//         return 0;
//     }
//     else if ($maLop !== $r['maLop']) {
//         return 2;
//     }
//     //
//     else if ($maLop == $r['maLop']){
//         $exam = [
//             "maBD"=>$maBD,
//             "mon"=>$m[1],
//             "soCauHoi"=>$r['soCauHoi'],
//             "thoiGianTest"=>$r['thoiGianTest'],
//             "kichHoat"=>$r['kichHoat']
//         ];
//         $_SESSION['exam'][$maBD] = $exam;
//         return 1;
//     }
    
// }