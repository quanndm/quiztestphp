<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4">
        <h3>Đề thi</h3>
        <a href="./index.php?controller=teacher&action=addExam" class="btn btn-primary">Thêm mới</a>
    </div>
    <div class="col-12 mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã đề</th>
                    <th scope="col">Môn</th>
                    <th scope="col">Số câu hỏi</th>
                    <th scope="col">Thời gian test</th>
                    <th scope="col">Thời gian Kích hoạt</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $de = new DeThi();
                    $r = $de->getListDebyGV($_SESSION['maGV']);
                    while($set=$r->fetch()):
                ?>
                <tr>
                    <th scope="row"><?php echo $set[0] ?></th>
                    <td>
                        <?php 
                            $mon = new Mon();
                            $res = $mon->getSubjectbyId($set[1]);
                            echo $res[1];
                        ?>
                    </td>
                    <td><?php echo $set[2] ?></td>
                    <td><?php echo $set[3] ?></td>
                    <td><?php echo $set[4] ?></td>
                    <td>
                        <?php 
                            $lop = new Lop();
                            $res = $lop->getClassbyId($set[6]);
                            echo $res[1];
                        ?>
                    </td>
                    <td>
                        <a href="./index.php?controller=teacher&action=showQuestion&id=<?php echo $set[0] ?>&maMon=<?php echo $set[1]?>" class="btn btn-primary">Chi tiết</a>
                        <a href="./index.php?controller=teacher&action=editExam&id=<?php echo$set[0]?>" class="btn btn-warning">Sửa</a>
                        <a href="./index.php?controller=teacher&action=deleteExam&id=<?php echo $set[0] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>

