<?php
class Giaovien{
    public function __construct(){}
    //get list 
    public function getListGiaoVien(){
        $db = new connect();
        $sql = "SELECT * FROM tbgiaovien";
        $r = $db->getList($sql);
        return $r;
    }
    public function getTeacherbyId($id){
        $db = new connect();
        $sql = "SELECT * FROM tbgiaovien WHERE maGV=$id";
        $r = $db->getInstance($sql);
        return $r;
    }
    public function getListTop3(){
        $db = new connect();
        $sql = "SELECT * FROM tbgiaovien LIMIT 3";
        $r = $db->getList($sql);
        return $r;
    }

    //insert 
    public function insertTeacher($tenGV, $user, $password){
        $sql = "INSERT INTO tbgiaovien(maGV, tenGV, user, password, role) VALUES(null, :tenGV, :user, :password, 0)";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":tenGV", $tenGV);
        $stm->bindParam(":user", $user);
        $stm->bindParam(":password", $password);

        $stm->execute();
    }
    //update
    public function updateTeacher($maGV,$tenGv, $userName, $password)
    {
        $db = new connect();
        $sql = "UPDATE tbgiaovien SET tenGV=:tenGV, user=:user, password=:password WHERE maGV=:maGV";
        $stmt = $db->execP($sql);
        $stmt->bindParam(":tenGV", $tenGv);
        $stmt->bindParam(":user", $userName);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":maGV", $maGV);
        $stmt->execute();
    }
    //login
    public function login($user, $pass){
        $pass = md5($pass);
        $db = new connect();
        $sql = "SELECT * FROM tbgiaovien WHERE user = '$user' AND password='$pass' LIMIT 1";
        $r = $db->getList($sql);
        return $r;
    }
}