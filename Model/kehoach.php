<?php
class Kehoach{
    public function __construct(){}
    //get list
    public function getList(){
        $db = new connect();
        $sql = "SELECT lop.tenLop, mon.tenMon, gv.tenGV, hocKy, namHoc, lop.maLop, mon.maMon FROM tbkehoachdayhoc AS kh INNER JOIN tblop AS lop ON kh.maLop = lop.maLop INNER JOIN tbmon AS mon ON kh.maMon = mon.maMon INNER JOIN tbgiaovien gv ON kh.maGV = gv.maGV";
        $r = $db->getList($sql);
        return $r;
    }
    public function getListKehoach(){
        $db = new connect();
        $sql = "SELECT * FROM tbkehoachdayhoc";
        $r = $db->getList($sql);
        return $r;
    }
    public function getKehoachbyid($maLop, $maMon){
        $db = new connect();
        $sql = "SELECT * FROM tbkehoachdayhoc where maLop = $maLop and maMon = '$maMon'";
        $r = $db->getInstance($sql);
        return $r;
    }
    public function getKehoachbyGV($maGV){
        $db = new connect();
        $sql = "SELECT lop.tenLop, mon.tenMon, gv.tenGV, hk.hocKy, nam.namHoc, lop.maLop, mon.maMon FROM tbkehoachdayhoc AS kh 
        INNER JOIN tblop AS lop ON kh.maLop = lop.maLop 
        INNER JOIN tbmon AS mon ON kh.maMon = mon.maMon 
        INNER JOIN tbgiaovien gv ON kh.maGV = gv.maGV 
        INNER JOIN tbhocky AS hk ON kh.idhocKy = hk.id
        INNER JOIN tbnamhoc as nam on kh.idnamHoc = nam.id
        WHERE kh.maGV=$maGV";
        $r = $db->getList($sql);
        return $r;
    }
    //insert 
    public function insertPlan($maLop, $maMon, $maGV, $hocKy, $namHoc){

        $sql = "INSERT INTO tbkehoachdayhoc(maLop, maMon, maGV, hocKy, namHoc) VALUES (:maLop, :maMon, :maGV, :hocKy, :namHoc)";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maLop", $maLop);
        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":hocKy", $hocKy);
        $stm->bindParam(":namHoc", $namHoc);

        $stm->execute();
    }
    //update
    public function updatePlan($maLop, $maMon, $maGV, $hocKy, $namHoc, $mlop, $mmon){
        $sql = "UPDATE tbkehoachdayhoc SET maLop=:maLop, maMon=:maMon, maGV=:maGV, hocKy=:hocKy, namHoc=:namHoc WHERE maLop=$mlop AND maMon=$mmon";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maLop", $maLop);
        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":hocKy", $hocKy);
        $stm->bindParam(":namHoc", $namHoc);

        $stm->execute();
    }
}