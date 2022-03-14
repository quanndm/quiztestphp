<?php
    $maGV = $_SESSION['maGV'];
    $maLop = $_GET['id'];
?>
<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4">
        <h3>Bảng điểm</h3>
        <a href="/xuatfile.php?maGV=<?php echo $maGV ?>" class="btn btn-primary">Xuất file Excel</a>
    </div>
    <div class="col-12 mt-2">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Lớp</th>
                    <th scope="col">Môn</th>
                    <th scope="col">Bộ Đề</th>
                    <!-- <th scope="col">Mã GV</th> -->
                    <th scope="col">Học Sinh</th>
                    <th scope="col">Số câu đúng</th>
                    <th scope="col">Điểm</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $maGV = $_SESSION['maGV'];
                    $kq =new KetQua();
                    $res = $kq->getKetQuabyIdGV($maGV);
                    while ($set = $res->fetch()):
                ?>
                <tr>
                    <td><?php echo $set["tenLop"] ?></td>
                    <td><?php echo $set["tenMon"] ?></td>
                    <td><?php echo $set["maBD"] ?></td>

                    <td><?php echo $set["tenHS"] ?></td>
                    <td><?php echo $set["soCauDung"] ?></td>
                    <td><?php echo $set["diem"] ?></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>

