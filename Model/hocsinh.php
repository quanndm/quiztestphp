<?php 
class HocSinh{
    public function __construct()
    {
        
    }
    //method dem so ban ghi
    // public function CountHS(){
    //     return $this->getListHocSinh()->rowCount();
    // }
    //get list
    public function getListHocSinh(){
        $sql = "SELECT * FROM tbhocsinh";
        $db= new connect();
        $r = $db->execP($sql);
        $r->execute();
        return $r;
    }
    // dem so hoc sinh hien co cua 1 lop
    public function getSoHSHienTai($maLop){
        // SELECT COUNT(`maHS`) FROM `tbhocsinh` WHERE `maLop`= 1
        $sql = "SELECT COUNT(`maHS`) FROM tbhocsinh WHERE maLop=:maLop";
        $db= new connect();

        $stm = $db->execP($sql);

        $stm->bindParam(":maLop", $maLop);

        $stm->execute();
        $r = $stm->fetch();
        return $r[0];
    }
    // get hoc sinh cua 1 lop
    public function getListHocSinhbyClassId($maLop){
        $sql = "SELECT * FROM tbhocsinh WHERE maLop=:maLop";
        $db= new connect();
        $r = $db->execP($sql);
        $r->bindParam(":maLop", $maLop);
        $r->execute();
        return $r;
    }
    // get list hoc sinh phan trang
    public function getListHocSinhPagebyClassId($maLop, $start, $limit){
        $sql = "SELECT * FROM tbhocsinh WHERE maLop=:maLop LIMIT $start, $limit";
        $db= new connect();
        $r = $db->execP($sql);
        $r->bindParam(":maLop", $maLop);
        $r->execute();
        return $r;
    }
    //get hoc sinh id
    public function getHocSinhbyId($id){
        $sql = "SELECT * FROM tbhocsinh WHERE maHS=:maHS";
        $db= new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maHS", $id);

        $stm->execute();
        $r = $stm->fetch();
        return $r;
    }
    
    //insert hoc sinh
    public function insertHocSinh($tenHS, $diachi, $dienthoai, $maLop){
        $lop = new Lop();
        $r = $lop->getClassbyId($maLop);

        //tao ma hoc sinh
        $className = $r[1];
        $stt =  $this->getSoHSHienTai($r[0]) +1;
        $maHS = "HS".$className."-".$stt;
        //tao user và password
        $username = "HS".$className.$stt;
        $password = md5("HS".$className.$stt);
        //cau lenh truy van
        $sql = "INSERT INTO tbhocsinh(maHS, tenHS, diaChi, dienThoai,username, password, maLop) VALUES(:maHS, :tenHS, :diaChi, :dienThoai, :username, :password, :maLop)";
        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maHS", $maHS);
        $stm->bindParam(":tenHS", $tenHS);
        $stm->bindParam(":diaChi", $diachi);
        $stm->bindParam(":dienThoai", $dienthoai);
        $stm->bindParam(":username", $username);
        $stm->bindParam(":password", $password);
        $stm->bindParam(":maLop", $maLop);

        $stm->execute();

    }
    //update
    public function updateHocSinh($maHS,$tenHS, $diachi, $dienthoai){
        $sql = "UPDATE tbhocsinh SET tenHS=:tenHS, diaChi=:diaChi, dienThoai=:dienThoai WHERE maHS=:maHS";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":tenHS", $tenHS);
        $stm->bindParam(":diaChi", $diachi);
        $stm->bindParam(":dienThoai", $dienthoai);
        $stm->bindParam(":maHS", $maHS);

        $stm->execute();
    }
    // login
    public function login($user, $pass){
        $sql = "SELECT * FROM tbhocsinh WHERE username = :username AND password=:password LIMIT 1";
        $pass = md5($pass);

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":username", $user);
        $stm->bindParam(":password", $pass);

        $stm->execute();
        return $stm;
    }
    // delete hoc sinh
    public function deleteHocsinh($maHS){
        $sql = "DELETE FROM tbhocsinh WHERE maHS=:maHS";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maHS", $maHS);

        $stm->execute();
    }
}