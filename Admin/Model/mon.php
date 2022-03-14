<?php
class Mon{
    public function __construct(){}
    // get list
    public function getListMon(){
        $db = new connect();
        $sql = "SELECT * FROM tbmon";
        $r = $db->getList($sql);
        return $r;
    }
    public function getSubjectbyId($id){
        $sql = "SELECT * FROM tbmon WHERE maMon='$id'";
        $db = new connect();
        $r = $db->getInstance($sql);
        return $r;
    }
    public function getListTop3(){
        $db = new connect();
        $sql = "SELECT * FROM tbmon LIMIT 3";
        $r = $db->getList($sql);
        return $r;
    }
    //insert
    public function insertSubject($maMon, $tenMon){
        $sql = "INSERT INTO tbmon(maMon, tenMon) VALUES (:maMon, :tenMon)";

        $db = new connect();
        $stm = $db->execP($sql);

        $stm->bindParam(":maMon", $maMon);
        $stm->bindParam(":tenMon", $tenMon);

        $stm->execute();
    } 
    //update
    public function updateSubject($mamon, $tenmon)
    {
        $db = new connect();
        $sql = "UPDATE tbmon SET maMon=:maMon, tenMon=:tenMon  WHERE maMon=:maMon";
        $stmt = $db->execP($sql);
        $stmt->bindParam(":maMon", $mamon);
        $stmt->bindParam(":tenMon", $tenmon);
        $stmt->execute();
    }
    // delete
    public function deleteSubject($maMon){
        $db = new connect();
        $sql = "DELETE FROM tbmon WHERE maMon=:maMon";
        $stmt = $db->execP($sql);

        $stmt->bindParam(":maMon", $maMon);

        $stmt->execute();
    }
}