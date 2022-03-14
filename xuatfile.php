<?php
$maGV = $_GET['maGV'];
// connect
$dbHost = "localhost"; 
$dbname = "tracnghiemonline";
$user = 'root';
$pass = 'root';

// Create database connection 
$db = new mysqli($dbHost, $user, $pass, $dbname); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}


// query
$query = $db->query("SELECT l.tenLop, m.tenMon, kq.maBD, hs.tenHS, kq.soCauDung, kq.diem FROM tbketqua AS kq INNER JOIN tblop as l on kq.maLop = l.maLop INNER JOIN tbmon as m on kq.maMon = m.maMon INNER JOIN tbgiaovien as gv on kq.maGV = gv.maGV INNER JOIN tbhocsinh as hs on kq.maHS = hs.maHS WHERE kq.maGV=$maGV"); 

if ($query->num_rows > 0) {
    $delimiter= ",";
    $filename = "export_".date("Y-m-d").".csv";
    // create file pointer
    $f = fopen('php://memory', 'w'); 
    //set column header
    $fields = array("Lớp","Môn","Bộ Đề","Học Sinh","Số câu đúng","Điểm");
    fputcsv($f, $fields, $delimiter); 
    //Output each row
    while($row = $query->fetch_assoc()){
        $lineData = array($row['tenLop'], $row['tenMon'], $row['maBD'], $row['tenHS'], $row['soCauDung'], $row['diem']);
        fputcsv($f, $lineData, $delimiter); 
    }
    // Move back to beginning of file 
    fseek($f, 0); 
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    //output all remaining data on a file pointer 
    fpassthru($f); 
}
exit; 
?>