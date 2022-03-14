<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <section class="d-flex justify-content-between">
            <h2 class="text-center">Kế hoạch dạy học</h2>
            <a class="btn btn-primary" href="./index.php?controller=plan&action=addBtn">Thêm mới</a>
        </section>
    </div>
</div>
<!-- table kehoach dạy học -->
<div class="row">
    <div class="col-ms-12 p-3">
        <div class="card">
            <div class="card-header">
                <h2>Kế hoạch dạy học</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Lớp</th>
                            <th scope="col">Môn</th>
                            <th scope="col">GV</th>
                            <th scope="col">Học kỳ</th>
                            <th scope="col">Năm học</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $kehoach= new Kehoach();
                            $r = $kehoach->getList();
                            while($set= $r->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set['tenLop'] ?></th>
                            <td><?php echo $set['tenMon'] ?></td>
                            <td><?php echo $set['tenGV'] ?></td>
                            <td><?php echo $set['hocKy'] ?></td>
                            <td><?php echo $set['namHoc'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="./index.php?controller=plan&action=editBtn&maLop=<?php echo $set['maLop'] ?>&maMon=<?php echo $set['maMon'] ?>&maHocky=<?php echo$set['idhocky'] ?>&manamhoc=<?php echo $set['idnamhoc']?>" role="button">Sửa</a>
                                <a class="btn btn-danger" href="./index.php?controller=plan&action=deleteBtn&maLop=<?php echo $set['maLop'] ?>&maMon=<?php echo $set['maMon'] ?>&maHocky=<?php echo$set['idhocky'] ?>&manamhoc=<?php echo $set['idnamhoc']?>" role="button">Xóa</a>
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