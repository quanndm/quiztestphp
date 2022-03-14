<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
        <h2>Học sinh</h2>
        <a href="./index.php?controller=teacher&action=backStudent&id=<?php echo $_GET['maLop'] ?>" class="btn btn-primary">Quay lại</a>
    </div>  
    <div class="col-12">
        <h3>Sửa học sinh</h3>
        <form action="./index.php?controller=teacher&action=editStudentBtn" method="POST">
            <?php
                $hs = new HocSinh();
                $r = $hs->getHocSinhbyId($_GET['id']);
            ?>
            <input type="hidden" name="maHS" value="<?php echo $r['maHS'] ?>">
            <div class="mb-3">
                <label for="tenhs" class="form-label">Tên học sinh</label>
                <input type="text" class="form-control" id="tenhs" name="tenHS" value="<?php echo $r['tenHS'] ?>">
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $r['diaChi'] ?>">
            </div>
            <div class="mb-3">
                <label for="dienthoai" class="form-label">Điện thoại</label >
                <input type="text" class="form-control" id="dienthoai" name="dienthoai" value="<?php echo $r['dienThoai'] ?>">
            </div> 
            <div class="mb-3">
                <label class="form-label">Lớp</label>
                <input type="text" name="malop" class="form-control" id="" value="<?php echo $r['maLop'] ?>" readonly>
            </div>
            <input type="submit" value="Sửa học sinh" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>