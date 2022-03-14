<?php
class Lop
{
    public function __construct()
    {
    }
    //get list
    public function getListClass()
    {
        $db = new connect();
        $sql = "SELECT * FROM tblop";
        $r = $db->getList($sql);
        return $r;
    }
    public function getListClassbyTeacherID($maGV){
        $sql = "SELECT l.maLop, l.tenLop, gv.maGV, gv.tenGV FROM tblop as l, tbkehoachdayhoc as kh, tbgiaovien as gv WHERE l.maLop = kh.maLop and kh.maGV = gv.maGV and gv.maGV=:maGV";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maGV", $maGV);

        $stm->execute();
        return $stm;
    }
    public function getListClassConlai($maMon, $maGV){
        $sql = "SELECT DISTINCT l.maLop, l.tenLop
        FROM tblop as l
        inner JOIN tbkehoachdayhoc as kh on kh.maLop = l.maLop
        LEFT JOIN tbdethi as de on de.maLop = l.maLop
        WHERE kh.maGV=:maGV AND l.maLop not IN 
        (
            SELECT de.maLop
            FROM tbdethi as de 
            WHERE de.maGV=:maGV AND de.maMon=:maMon
        )";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":maMon", $maMon);

        $stm->execute();
        return $stm;
    }
    public function getClassbyId($id)
    {
        $db = new connect();
        $sql = "SELECT * FROM tblop WHERE maLop=$id";
        $r = $db->getInstance($sql);
        return $r;
    }
    public function getListTop3(){
        $db = new connect();
        $sql = "SELECT * FROM tblop LIMIT 3";
        $r = $db->getList($sql);
        return $r;
    }

    // get so hs trong 1 lop
    public function getSoHSbyClassID($maLop){
        $sql = "SELECT siSo FROM `tblop` WHERE maLop=:maLop";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maLop", $maLop);

        $stm->execute();
        $r = $stm->fetch();
        return $r[0];
    }
    //insert class
    public function insertClass($tenlop, $siso)
    {
        $sql = "INSERT INTO tblop(maLop, tenLop, siSo) VALUES (NULL, :tenLop, :siSo)";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":tenLop", $tenlop);
        $stm->bindParam(":siSo", $siso);

        $stm->execute();
    }
    //update class
    public function updateClass($malop, $tenlop, $siso)
    {
        $db = new connect();
        $sql = "UPDATE tblop SET tenLop=:tenLop, siSo=:siSo WHERE maLop=:maLop";
        $stmt = $db->execP($sql);
        $stmt->bindParam(":tenLop", $tenlop);
        $stmt->bindParam(":siSo", $siso);
        $stmt->bindParam(":maLop", $malop);
        $stmt->execute();
    }
}
