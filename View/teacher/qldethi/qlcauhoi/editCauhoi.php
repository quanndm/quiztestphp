<?php
    $maBD = $_GET['maBD'];
    $maMon = $_GET['maMon']
?>
<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
        <h2>Câu hỏi</h2>
        <div>
            <a href="./index.php?controller=teacher&action=backQuestion&maBD=<?php echo $maBD ?>&maMon=<?php echo $maMon ?>" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <div class="col-12">
        <form method="POST" action="./index.php?controller=teacher&action=editQuestionBtn">
            <?php 
                $maND = $_GET['id'];
                $de = new DeThi();
                $res = $de->getCauHoibyId($maND);
                $noidung = $res[1];
                $dapanA = $res[2];
                $dapanB = $res[3];
                $dapanC = $res[4];
                $dapanD = $res[5];
                $ketqua = $res[6];
            ?>
            <input type="hidden" name="maND" value="<?php echo $maND ?>">
            <input type="hidden" name="maBD" value="<?php echo $maBD ?>">
            <input type="hidden" name="maMon" value="<?php echo $maMon ?>">
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <input type="text" class="form-control" name="noiDung" value="<?php echo $noidung ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Đáp án A</label>
                <input type="text" class="form-control" name="dapAnA" value="<?php echo $dapanA ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Đáp án B</label>
                <input type="text" class="form-control" name="dapAnB" value="<?php echo $dapanB ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Đáp án C</label>
                <input type="text" class="form-control" name="dapAnC" value="<?php echo $dapanC?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Đáp án D</label>
                <input type="text" class="form-control" name="dapAnD" value="<?php echo $dapanD ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kết quả</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ketqua" id="dapAnA" value="A" <?php if($ketqua == "A") echo "checked" ?>>
                    <label class="form-check-label" for="dapAnA">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ketqua" id="dapAnB" value="B" <?php if($ketqua == "B") echo "checked" ?>>
                    <label class="form-check-label" for="dapAnB">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ketqua" id="dapAnC" value="C" <?php if($ketqua == "C") echo "checked" ?>>
                    <label class="form-check-label" for="dapAnC">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ketqua" id="dapAnD" value="D" <?php if($ketqua == "D") echo "checked" ?>>
                    <label class="form-check-label" for="dapAnD">D</label>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Sửa câu hỏi" name="submit_question">
        </form>
    </div>
</div>