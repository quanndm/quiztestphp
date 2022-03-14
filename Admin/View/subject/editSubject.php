<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
    <section class="d-flex justify-content-between">
            <h2 class="text-center">Môn học</h2>
            <a class="btn btn-primary" href="./index.php?controller=subject&action=back">Quay lại</a>
        </section>
    </div>
</div>
<!-- form mon hoc -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Sửa môn học
            </div>
            <div class="card-body">
                <form action="./index.php?controller=subject&action=edit" method="POST">
                    <?php
                        $mon = new Mon();
                        $r = $mon->getSubjectbyId($_GET['id']);
                    ?>
                    <div class="mb-3">
                        <label for="maMon" class="form-label">Mã Môn</label>
                        <input type="text" class="form-control" id="maMon" name="maMon" value="<?php echo $r[0] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tenMon" class="form-label">Tên Môn</label>
                        <input type="text" class="form-control" id="tenMon" name="tenMon" value="<?php echo $r[1] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>