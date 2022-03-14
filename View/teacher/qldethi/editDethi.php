<?php
    $lop = new Lop();
    $de = new DeThi();
    $res = $de->getDebyId($_GET['id']);
    $maBD = $res[0];
    $maMon = $res[1];
    $soCauHoi = $res[2];
    $thoiGianTest = $res[3];
    $kichHoat = $res[4];
    $maGV = $res[5];
    $maLop = $res[6];
?>

<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
        <h2>Đề thi</h2>
        <div>
            <a href="./index.php?controller=teacher&action=backExam" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <div class="col-12">
        <form method="POST" action="./index.php?controller=teacher&action=editDethiBtn">
            <input type="hidden" name="maBD" value="<?php echo $maBD ?>">
            <div class="mb-3">
                <label class="form-label">Môn</label>
                        <select name="maMon" class="form-select" aria-label="Default select example">
                            <?php
                                $mon = new Mon();
                                $r = $mon->getListSubjectbyTeacherId($maGV);
                                while($set = $r->fetch()):
                            ?>
                            <option <?php if($set[0] == $maMon) echo"selected"; ?> value="<?php echo $set[0] ?>"><?php echo $set[1]?></option>
                            <?php
                                endwhile;
                            ?>
                        </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Số câu hỏi</label>
                <input type="number" min="10" class="form-control" name="soCauHoi" value="<?php echo $soCauHoi?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Thời gian test</label>
                <input type="number" class="form-control" min="15" name="thoiGianTest" value="<?php echo $thoiGianTest ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kích hoạt</label>
                <input type="datetime-local" value="<?php echo $kichHoat?>"  class="form-control" name="kichHoat">
            </div>
            <!-- <div class="mb-3"> -->
                <!-- <label class="form-label">Giáo viên</label> -->
                <input type="hidden" class="form-control" name="maGV" value="<?php echo $_SESSION['maGV'] ?>">
            <!-- </div> -->
            <div class="mb-3">
                <label class="form-label">Lớp</label>
                <select name="maLop" class="form-select" aria-label="Default select example">
                    <?php
                        
                        $r = $lop->getListClassbyTeacherID($maGV);
                        while($set = $r->fetch()):
                    ?>
                    <option <?php if($maLop == $set[0]) echo "selected"?> value="<?php echo $set[0] ?>"><?php echo $set[1] ?></option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Sửa Đề Thi" name="submit">
        </form>
    </div>
</div>