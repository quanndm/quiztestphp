<?php
class DeThi{
    const DIEM = 10;
    public function __construct()
    {
        
    }
    // get list 
    public function getListDe(){
        $sql = "SELECT * FROM tbdethi";
        $db = new connect();
        $r = $db->getList($sql);
        return $r;
    }
    // get list de theo lop
    public function getListDebyClassID($maLop){
        $sql = "SELECT * FROM tbdethi WHERE maLop = $maLop";
        $db = new connect();
        $r = $db->getList($sql);
        return $r;
    }
    //getlist de thi theo ma gv
    public function getListDebyGV($maGV){
        $sql = "SELECT * FROM tbdethi WHERE maGV = $maGV";
        $db = new connect();
        $r = $db->getList($sql);
        return $r;
    }

    // get de qua ma de
    public function getDebyId($maBD){
        $sql = "SELECT * FROM tbdethi WHERE maBD = $maBD";
        $db = new connect();
        $r = $db->getList($sql);
        $res = $r->fetch();
        return $res;
    }
    // get list de thi theo lop
    public function getDebyClassID($maLop){
        $sql = "SELECT d.maBD, m.tenMon, d.kichHoat FROM tbdethi as d INNER JOIN tbmon as m ON d.maMon=m.maMon WHERE maLop=:maLop";
        $db = new connect();
        $stm = $db->execP($sql);
        
        $stm->bindParam(":maLop", $maLop);

        $stm->execute();
        return $stm;
    }
    //get list cau hoi cua 1 bo de
    public function getCauHoi($maDe){
        $sql = "SELECT * FROM tbnoidungbode WHERE maBD=:maBD ";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maBD", $maDe);

        $stm->execute();

        return $stm;
    }
    // get list random cau hoi cua 1 bo de
    public function getCauHoiRandom($maDe){
        $sql = "SELECT * FROM tbnoidungbode WHERE maBD=:maBD ORDER BY RAND()";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maBD", $maDe);

        $stm->execute();

        return $stm;
    }
    //lay so cau hoi cua 1 de
    public function getSoCauHoi($maDe){
        $sql = "SELECT soCauHoi FROM tbdethi WHERE maBD=:maBD limit 1";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maBD", $maDe);

        $stm->execute();
        $r = $stm->fetch();
        return $r;
    }
    //lay so cau hoi hien dang co cua 1 bo de
    public function countSoCauHoi($maDe){
        $sql = "SELECT COUNT(maND) FROM tbnoidungbode WHERE maBD=:maBD";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maBD", $maDe);

        $stm->execute();
        $r = $stm->fetch();
        return $r;
    }
    // get cau hoi
    public function getCauHoibyId($maND){
        $sql = "SELECT * FROM tbnoidungbode WHERE maND=:maND";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maND", $maND);

        $stm->execute();
        $r = $stm->fetch();
        return $r;
    }
    //insert de thi
    public function insertDethi($maMon, $soCauHoi, $thoiGianTest, $kichHoat,$maGV, $maLop){
        $sql = "INSERT INTO `tbdethi` (`maBD`, `maMon`, `soCauHoi`, `thoiGianTest`, `kichHoat`,`maGV`, `maLop`) VALUES (NULL, :maMon, :soCauHoi, :thoiGianTest, :kichHoat, :maGV, :maLop)";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":soCauHoi", $soCauHoi);
        $stm->bindParam(":thoiGianTest", $thoiGianTest);
        $stm->bindParam(":kichHoat", $kichHoat);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":maLop", $maLop);

        $stm->execute();
    }
    //insert cau hoi
    public function insertCauhoi($noidung, $dapanA, $dapanB, $dapanC, $dapanD, $ketqua, $maBD){
        $sql = "INSERT INTO tbnoidungbode(maND, noiDungCauHoi, dapAn_A, dapAn_B, dapAn_C, dapAn_D, ketQua, diemMotCau, maBD) VALUES(NULL, :noiDungCauHoi, :dapAn_A, :dapAn_B, :dapAn_C, :dapAn_D, :ketQua, :diemMotCau, :maBD)";
        $diemmotcau = round((self::DIEM)/($this->getSoCauHoi($maBD)[0]), 2);
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":noiDungCauHoi", $noidung);
        $stm->bindParam(":dapAn_A", $dapanA);
        $stm->bindParam(":dapAn_B", $dapanB);
        $stm->bindParam(":dapAn_C", $dapanC);
        $stm->bindParam(":dapAn_D", $dapanD);
        $stm->bindParam(":ketQua", $ketqua);
        $stm->bindParam(":diemMotCau", $diemmotcau);
        $stm->bindParam(":maBD", $maBD);

        $stm->execute();
    }
    // update de thi
    public function updateDethi($maBD,$maMon, $soCauHoi, $thoiGianTest, $kichHoat, $maGV, $maLop){
        $sql = "UPDATE tbdethi SET maMon=:maMon, soCauHoi=:soCauHoi, thoiGianTest=:thoiGianTest, kichHoat=:kichHoat, maGV=:maGV, maLop=:maLop WHERE maBD=$maBD";
        $db= new connect();
        $stm = $db->execP($sql);


        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":soCauHoi", $soCauHoi);
        $stm->bindParam(":thoiGianTest", $thoiGianTest);
        $stm->bindParam(":kichHoat", $kichHoat);
        $stm->bindParam(":maGV", $maGV);
        $stm->bindParam(":maLop", $maLop);

        $stm->execute();
    }
    // xóa đề thi
    public function deleteDethi($maBD){
        $sql = "DELETE FROM tbdethi WHERE maBD=:maBD";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maBD", $maBD);

        $stm->execute();
        $r = $stm->fetch();
        return $r;
    }
    // update cau hoi
    public function updateCauhoi($noidung, $dapanA, $dapanB, $dapanC, $dapanD, $ketqua,$maND){
        $sql = "UPDATE tbnoidungbode SET noiDungCauHoi=:noiDungCauHoi, dapAn_A=:dapAn_A, dapAn_B=:dapAn_B, dapAn_C=:dapAn_C, dapAn_D=:dapAn_D, ketQua=:ketQua WHERE maND=:maND";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maND", $maND);
        $stm->bindParam(":noiDungCauHoi", $noidung);
        $stm->bindParam(":dapAn_A", $dapanA);
        $stm->bindParam(":dapAn_B", $dapanB);
        $stm->bindParam(":dapAn_C", $dapanC);
        $stm->bindParam(":dapAn_D", $dapanD);
        $stm->bindParam(":ketQua", $ketqua);

        $stm->execute();
    }
    // delete cau hỏi
    public function deleteCauHoi($maND, $maBD){
        $sql = "DELETE FROM tbnoidungbode WHERE maND=:maND AND maBD=:maBD";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maND", $maND);
        $stm->bindParam(":maBD", $maBD);

        $stm->execute();
    }
}