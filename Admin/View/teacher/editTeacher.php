<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
    <section class="d-flex justify-content-between">
            <h2 class="text-center">Giáo viên</h2>
            <a class="btn btn-primary" href="./index.php?controller=teacher&action=back">Quay lại</a>
        </section>
    </div>
</div>
<!-- form giao vien -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Sửa giáo viên
            </div>
            <div class="card-body">
                <form action="./index.php?controller=teacher&action=edit" method="POST">
                    <?php
                        $gv = new Giaovien();
                        $r = $gv->getTeacherbyId($_GET['id']);
                    ?>
                    <input type="hidden" name="maGv" value="<?php echo $r[0] ?>">
                    <div class="mb-3">
                        <label for="tenGv" class="form-label">Tên Giáo Viên</label>
                        <input type="text" class="form-control" id="tenGv" name="tenGv" value="<?php echo $r[1] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $r[2] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $r[3] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>