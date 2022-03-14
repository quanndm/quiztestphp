<?php
$maBD = $_GET['id'];
$maMon = $_GET['maMon'];
$de = new DeThi();
$mon = new Mon();
?>
<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4">
        <h3>Đề thi: <?php echo $maBD ?></h3>
        <div >
            <a href="./index.php?controller=teacher&action=addQuestionExcelForm&id=<?php echo $maBD ?>&maMon=<?php echo $maMon ?>" id="themcauhoiExcel" class="btn btn-primary">Thêm bằng csv</a>
            <a href="./index.php?controller=teacher&action=addQuestion&maBD=<?php echo $maBD ?>&maMon=<?=$maMon?>" id="themcauhoi" class="btn btn-primary ">Thêm câu hỏi</a>
            <a href="./index.php?controller=teacher&action=backExam" class="btn btn-primary">Quay về</a>
        </div>
    </div>
    <div class="col-12">
        <h4>
            Môn:
            <?php
            echo $mon->getSubjectbyId($maMon)[1];
            ?>
            <br>
            Số câu hỏi:
            <span class="tongcauhoihientai">
                <?php
                echo $de->countSoCauHoi($maBD)[0];
                ?>
            </span>/
            <span class="tongcauhoi">
                <?php
                echo $de->getSoCauHoi($maBD)[0];
                ?>
            </span>
        </h4>
    </div>
    <div class="col-12 mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã ND</th>
                    <th scope="col">Nội dung câu hỏi</th>
                    <th scope="col">Đáp án A</th>
                    <th scope="col">Đáp án B</th>
                    <th scope="col">Đáp án C</th>
                    <th scope="col">Đáp án D</th>
                    <th scope="col">Kết quả</th>
                    <th scope="col">Điểm 1 câu</th>
                    <th scope="col">mã BD</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $r =  $de->getCauHoi($maBD);
                while ($set = $r->fetch()) :
                ?>
                    <tr>
                        <th scope="row"><?php echo $set[0] ?></th>
                        <td><?php echo $set[1] ?></td>
                        <td><?php echo $set[2] ?></td>
                        <td><?php echo $set[3] ?></td>
                        <td><?php echo $set[4] ?></td>
                        <td><?php echo $set[5] ?></td>
                        <td><?php echo $set[6] ?></td>
                        <td><?php echo $set[7] ?></td>
                        <td><?php echo $set[8] ?></td>
                        <td>
                            <a href="./index.php?controller=teacher&action=editQuestion&id=<?php echo $set[0] ?>&maBD=<?php echo $set[8] ?>&maMon=<?php echo $maMon ?>" class="btn btn-warning">Sửa</a>
                            <a href="./index.php?controller=teacher&action=deleteQuestion&id=<?php echo $set[0] ?>&maBD=<?php echo $set[8] ?>&maMon=<?php echo $maMon ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    let socauhoihientai = document.getElementsByClassName("tongcauhoihientai")[0];
    let tongcauhoi = document.getElementsByClassName("tongcauhoi")[0];
    if (parseInt(socauhoihientai.innerText) === parseInt(tongcauhoi.innerText)) {
        document.getElementById("themcauhoi").style.display = "none";
        document.getElementById("themcauhoiExcel").style.display = "none";
    }
    
</script>