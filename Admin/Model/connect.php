<?php
class connect{
    var $db = null;
	public function __construct()
	{
		$dsn = 'mysql:host=localhost;dbname=tracnghiemonline';
		$user = 'root';
		$pass = 'root';
		try {
			$this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} catch (PDOexception $e) {
			echo $e->getMessage();
			echo "Khong thanh cong";
			exit();
		}
	}
    //	lấy đúng 1 ID nên lấy fetch vô luôn
	public function getInstance($select)
	{
		$results = $this->db->query($select);
		$result = $results->fetch();
		return $result;
	}
    //	Lấy nhiều rows
	public function getList($select)
	{
		$results = $this->db->query($select);
		return $results;
	}
    public function execP($query)
	{
		$results = $this->db->prepare($query);
		// echo $results;
		return ($results);
	}
}