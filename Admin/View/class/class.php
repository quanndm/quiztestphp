<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <section class="d-flex justify-content-between">
            <h2 class="text-center">Lớp</h2>
            <a class="btn btn-primary" href="./index.php?controller=class&action=addBtn">Thêm mới</a>
        </section>
    </div>
</div>
<!-- table giáo viên -->
<div class="row">
    <div class="col-ms-12 p-3">
        <div class="card">
            <div class="card-header">
                <h3>Lớp</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Mã Lớp</th>
                            <th scope="col">Tên Lớp</th>
                            <th scope="col">Sỉ Số</th>
                            <th scope="col">Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $lop = new Lop();
                            $r =  $lop->getListClass();
                            while($set = $r->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set[0] ?></th>
                            <td><?php echo $set[1] ?></td>
                            <td><?php echo $set[2] ?></td>
                            <td>
                                <a class="btn btn-warning" href="./index.php?controller=class&action=editBtn&id=<?php echo $set[0]?>" role="button">Sửa</a>
                                <a class="btn btn-danger" href="./index.php?controller=class&action=deleteBtn&id=<?php echo $set[0]?>" role="button">Xóa</a>
                            </td>
                        </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>