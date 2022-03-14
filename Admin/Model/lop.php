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
    public function getListClassPlan($maMon, $idHocky, $idNamhoc){
        $sql = "SELECT Distinct l.maLop, l.tenLop FROM tblop AS l LEFT JOIN tbkehoachdayhoc as kh ON l.maLop = kh.maLop WHERE l.maLop NOT IN (SELECT kh.maLop FROM tbkehoachdayhoc as kh WHERE kh.maMon=:maMon AND kh.idhocKy=:idhocKy AND kh.idnamHoc=:idnamHoc)";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":idhocKy", $idHocky);
        $stm->bindParam(":idnamHoc", $idNamhoc);

        $stm->execute();
        return $stm;
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
    //delete class
    public function deleteClass($malop){
        $db = new connect();
        $sql = "DELETE FROM tblop WHERE maLop=:maLop";
        $stmt = $db->execP($sql);
        
        $stmt->bindParam(":maLop", $malop);

        $stmt->execute();
    }
}
