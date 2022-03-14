<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <section class="d-flex justify-content-between">
            <h2 class="text-center">Lớp</h2>
            <a class="btn btn-primary" href="./index.php?controller=class&action=back">Quay lại</a>
        </section>
    </div>
</div>
<!-- form lop hoc -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Thêm lớp học
            </div>
            <div class="card-body">
                <form action="./index.php?controller=class&action=edit" method="POST">
                    <?php
                        $lop = new Lop();
                        $r= $lop->getClassbyId($_GET['id']);
                    ?>
                    <input type="hidden" name="maLop" value="<?php echo $r[0] ?>">
                    <div class="mb-3">
                        <label for="tenLop" class="form-label">Tên Lớp</label>
                        <input type="text" class="form-control" id="tenLop" name="tenLop" value="<?php echo $r[1] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="siso" class="form-label">Sỉ Số</label>
                        <input type="number" min="1" max="40" class="form-control" id="siso" name="siso" value="<?php echo $r[2] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>