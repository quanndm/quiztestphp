<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
        <h2>Đề thi</h2>
        <div>
            <a href="./index.php?controller=teacher&action=backExam" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <div class="col-12">
        <form method="POST" action="./index.php?controller=teacher&action=addExamBtn">
            <div class="mb-3">
                <label class="form-label">Môn</label>
                <select id="monhoc" name="maMon" class="form-select" aria-label="Default select example">
                    <option value="">Chọn môn học</option>
                    <?php
                    $maGV = $_SESSION['maGV'];
                    $mon = new Mon();
                    $r = $mon->getListSubjectbyTeacherId($maGV);
                    while ($set = $r->fetch()) :
                    ?>
                        <option value="<?php echo $set[0] ?>"><?php echo $set[1] ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Số câu hỏi</label>
                <input type="number" min="10" class="form-control" name="soCauHoi">
            </div>
            <div class="mb-3">
                <label class="form-label">Thời gian test</label>
                <input type="number" class="form-control" min="15" name="thoiGianTest">
            </div>
            <div class="mb-3">
                <label class="form-label">Kích hoạt</label>
                <input type="datetime-local" min="<?php echo (new DateTime("now"))->format("Y-m-d\TH:i") ?>" class="form-control" name="kichHoat">
            </div>
            <!-- <div class="mb-3"> -->
            <!-- <label class="form-label">Giáo viên</label> -->
            <input type="hidden" class="form-control" name="maGV" value="<?php echo $_SESSION['maGV'] ?>">
            <!-- </div> -->
            <div class="mb-3">
                <label class="form-label">Lớp</label>
                <select id="lophoc" name="maLop" class="form-select" aria-label="Default select example">
                    <option value="">Chọn lớp học</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Thêm Đề Thi" name="submit_dethi">
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#monhoc").on("change", function() {
            const idmonhoc = $(this).val();
            const obj = {
                "idmonhoc":idmonhoc,
                "idGV": <?php echo $_SESSION['maGV'] ?>
            }
            if (idmonhoc) {
                $.ajax({
                    type:"POST",
                    url: "./api/dethiApi.php",
                    data : {mydata: JSON.stringify(obj)},
                    success:function(html){
                        $("#lophoc").html(html);
                    }
                })
            }else{
                $("#lophoc").html(`
                    <option value="">Chọn lớp học</option>
                `);
            }
        })
    })
</script>