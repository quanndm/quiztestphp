<?php
class KetQua{
    public function __construct(){}
    //get List
    public function getKetQuabyIdGV($maGV){
        $sql = "SELECT l.maLop, l.tenLop, m.maMon, m.tenMon, kq.maBD, gv.maGV, gv.tenGV, hs.maHS, hs.tenHS, kq.soCauDung, kq.diem FROM tbketqua AS kq INNER JOIN tblop as l on kq.maLop = l.maLop INNER JOIN tbmon as m on kq.maMon = m.maMon INNER JOIN tbgiaovien as gv on kq.maGV = gv.maGV INNER JOIN tbhocsinh as hs on kq.maHS = hs.maHS WHERE kq.maGV=:maGV";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maGV", $maGV);

        $stm->execute();
        return $stm;
    }
    public function getKetQuabyIdHS($maHS){
        // $sql = "SELECT * FROM `tbketqua` WHERE maHS=:maHS";
        $sql = "SELECT l.maLop, l.tenLop, m.maMon, m.tenMon, kq.maBD, gv.maGV, gv.tenGV, hs.maHS, hs.tenHS, kq.soCauDung, kq.diem FROM tbketqua AS kq INNER JOIN tblop as l on kq.maLop = l.maLop INNER JOIN tbmon as m on kq.maMon = m.maMon INNER JOIN tbgiaovien as gv on kq.maGV = gv.maGV INNER JOIN tbhocsinh as hs on kq.maHS = hs.maHS WHERE kq.maHS =:maHS";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maHS", $maHS);

        $stm->execute();
        return $stm;
    }
    public function getKetQuabymaHS_maMon($maHS, $tenMon){
        $sql = "SELECT l.maLop, l.tenLop, m.maMon, m.tenMon, kq.maBD, gv.maGV, gv.tenGV, hs.maHS, hs.tenHS, kq.soCauDung, kq.diem FROM tbketqua AS kq INNER JOIN tblop as l on kq.maLop = l.maLop INNER JOIN tbmon as m on kq.maMon = m.maMon INNER JOIN tbgiaovien as gv on kq.maGV = gv.maGV INNER JOIN tbhocsinh as hs on kq.maHS = hs.maHS WHERE kq.maHS =:maHS AND m.tenMon =:tenMon";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maHS", $maHS);
        $stm->bindParam(":tenMon", $tenMon);

        $stm->execute();
        return $stm;
    }
    // insert ket qua
    public function insertKetQua($maLop, $maMon, $maBD, $maGV, $maHS, $soCauDung, $diem){
        $sql = "INSERT INTO tbketqua(maLop, maMon, maBD, maGV, maHS, soCauDung, diem) VALUES (:maLop, :maMon, :maBD, :maGV, :maHS, :soCauDung, :diem)";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maLop", $maLop);
        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":maBD", $maBD);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":maHS", $maHS);
        $stm->bindParam(":soCauDung", $soCauDung);
        $stm->bindParam(":diem", $diem);

        $stm->execute();
    }
}