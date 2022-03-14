<?php
if ($note != "excel") :
?>
<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
        <h2>Học sinh</h2>
        <div>
            <a href="./index.php?controller=teacher&action=backStudent&id=<?php echo $_GET['maLop'] ?>" class="btn btn-primary">Quay lại</a>

        </div>
    </div>
    <div class="col-12">
        <h3>Thêm học sinh</h3>
        <form action="./index.php?controller=teacher&action=addStudentBtn" method="POST">
            <div class="mb-3">
                <label for="tenhs" class="form-label">Tên học sinh</label>
                <input type="text" class="form-control" id="tenhs" name="tenHS" required>
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" required>
            </div>
            <div class="mb-3">
                <label for="dienthoai" class="form-label">Điện thoại</label >
                <input type="text" class="form-control" id="dienthoai" name="dienthoai" required>
            </div> 
            <div class="mb-3">
                <label class="form-label">Mã Lớp</label>
                <input type="text" class="form-control" name="malop" value="<?php echo $_GET['maLop'] ?>" readonly>
            </div>
            <input type="submit" value="Thêm học sinh" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>
<?php
    else:
?>
<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
        <h2>Học sinh</h2>
        <div>
            <a href="./src/files/fileDemoAddStudent.csv" class="btn btn-primary" download="fileDemo.csv">Tải file mẫu excel</a>
            <a href="./index.php?controller=teacher&action=backStudent&id=<?php echo $_GET['maLop'] ?>" class="btn btn-primary">Quay lại</a>
        </div>
    </div>  
    <div class="col-12">
        <h3 class="text-center">Thêm file excel học sinh</h3>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <form action="./index.php?controller=teacher&action=addStudentExcel" enctype="multipart/form-data" method="POST" style="display: block;">
            <input type="file" name="file" id="file" class="file">
            <input type="hidden" name="maLop" value="<?php echo $_GET['maLop'] ?>">
            <div class="d-flex">
                <input type="text" name="file-name" id="file-name" class="file-name" readonly="readonly">
                <input type="button" class="btnAddFile" value="select">
            </div><br>
            <input type="submit" name="submit_file" style="margin: 0 auto; display: block;" class="btn btn-primary" value="Thêm học sinh">
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.btnAddFile').on('click', function() {
                $('.file').trigger('click');
            });

            $('.file').on('change', function() {
                var fileName = $(this)[0].files[0].name;
                $('#file-name').val(fileName);
            });
        })
    </script>
</div>
<?php
    endif;
?>