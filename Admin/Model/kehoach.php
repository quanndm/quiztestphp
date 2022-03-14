<?php
class Kehoach{
    public function __construct(){}
    //get list
    public function getList(){
        $db = new connect();
        $sql = "SELECT lop.maLop,lop.tenLop, mon.maMon,mon.tenMon, gv.tenGV, nam.id as idnamhoc, nam.namHoc, hk.id as idhocky,hk.hocKy, lop.maLop, mon.maMon FROM tbkehoachdayhoc AS kh INNER JOIN tblop AS lop ON kh.maLop = lop.maLop INNER JOIN tbmon AS mon ON kh.maMon = mon.maMon INNER JOIN tbgiaovien gv ON kh.maGV = gv.maGV INNER JOIN tbhocky as hk on hk.id = kh.idhocKy INNER JOIN tbnamhoc AS nam on kh.idnamHoc = nam.id";
        $r = $db->getList($sql);
        return $r;
    }
    public function getListKehoach(){
        $db = new connect();
        $sql = "SELECT * FROM tbkehoachdayhoc";
        $r = $db->getList($sql);
        return $r;
    }
    public function getKehoachbyid($maLop, $maMon, $maHK, $maNamhoc){
        $db = new connect();
        $sql = "SELECT * FROM tbkehoachdayhoc where maLop = $maLop and maMon = '$maMon' and idhocKy=$maHK and idnamHoc = $maNamhoc";
        $r = $db->getInstance($sql);
        return $r;
    }
    public function getListNamHoc(){
        $db = new connect();
        $sql = "SELECT * FROM tbnamhoc";
        $r = $db->getList($sql);
        return $r;
    }
    public function getListHocKy(){
        $db = new connect();
        $sql = "SELECT * FROM tbhocky";
        $r = $db->getList($sql);
        return $r;
    }
    //insert 
    public function insertPlan($maLop, $maMon, $maGV, $hocKy, $namHoc){
        $sql = "INSERT INTO tbkehoachdayhoc(maLop, maMon, maGV, idhocKy, idnamHoc) VALUES (:maLop, :maMon, :maGV, :idhocKy, :idnamHoc)";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maLop", $maLop);
        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":idhocKy", $hocKy);
        $stm->bindParam(":idnamHoc", $namHoc);

        $stm->execute();
    }
    //update
    public function updatePlan($maMon, $maGV, $hocKy, $namHoc, $mlop, $mmon, $mhk, $mnamhoc){
        $sql = "UPDATE tbkehoachdayhoc SET maMon=:maMon, maGV=:maGV, idhocKy=:idhocKy, idnamHoc=:idnamHoc WHERE maLop=$mlop AND maMon='$mmon' and idhocKy=$mhk and idnamHoc=$mnamhoc";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":idhocKy", $hocKy);
        $stm->bindParam(":idnamHoc", $namHoc);

        $stm->execute();
    }
    public function deletePlan($malop,$mamon, $maHK, $maNamhoc){
        $db = new connect();
        $sql = "DELETE FROM tbkehoachdayhoc WHERE maLop=:maLop AND maMon=:maMon AND idhocKy=:idhocKy AND idnamHoc=:idnamHoc";
        $stmt = $db->execP($sql);
        
        $stmt->bindParam(":maLop", $malop);
        $stmt->bindParam(":maMon", $mamon);
        $stmt->bindParam(":idhocKy", $maHK);
        $stmt->bindParam(":idnamHoc", $maNamhoc);

        $stmt->execute();
    }
}