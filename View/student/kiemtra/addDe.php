<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4">
        <h3>Kiểm tra</h3>
    </div>
    <div class="col-12 mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã đề</th>
                    <th scope="col">Môn</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $maLop = $_SESSION['maLop'];
                    $now = new DateTime("now");
                    $de = new DeThi();
                    $ketqua = new KetQua();
                    $res = $de->getDebyClassID($maLop);
                    while($set=$res->fetch()):
                        $time = new DateTime($set['kichHoat']);
                        if($now >= $time):
                            if(($ketqua->getKetQuabymaHS_maMon($_SESSION['maHS'],$set['tenMon']))->rowCount()==0):
                ?>
                <tr id="<?php echo $set['maBD'] ?>">
                    <td><?php echo $set['maBD']?></td>
                    <td><?php echo $set['tenMon']?></td>
                    <td><a href="./index.php?controller=student&action=test&maBD=<?php echo $set['maBD'] ?>" class="btn btn-danger kiemtra">Kiểm tra</a></td>
                </tr>
                <?php
                            endif;
                        endif;
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>
