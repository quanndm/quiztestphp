<?php
$maLop = $_GET['id'];
//khoi tao doi tuong page
$p = new Pagination();
// cho gioi han limit
$limit = 5;
// tim start
$start = $p->findStart($limit);
// tao doi tuong hoc sinh
$hs = new HocSinh();
// tim tong so ban ghi
$result = $hs->getListHocSinhbyClassId($maLop);
$count = $result->rowCount();
$page = $p->findPage($count, $limit);
$currenPage = isset($_GET['page'])?$_GET['page']:1;
?>

<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4">
        <h3>Học sinh</h3>
        <div>
            <a href="./index.php?controller=teacher&action=addStudentExcelForm&maLop=<?php echo $maLop ?>" id="themHSExcel" class="btn btn-primary">Thêm bằng excel</a>
            <a href="./index.php?controller=teacher&action=addStudent&maLop=<?php echo $maLop ?>" id="themhocsinh" class="btn btn-primary">Thêm mới</a>
            <a href="./index.php?controller=teacher&action=backAllClass" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <div class="col-12">
        <h4>Lớp:
            <?php
            $lop = new Lop();
            echo $lop->getClassbyId($maLop)[1];
            ?>
        </h4>
        <h4>
            Sỉ số:
            <span class="soHShientai">
                <?php
                $hs = new HocSinh();
                echo $hs->getSoHSHienTai($maLop);
                unset($hs);
                ?>
            </span>/
            <span class="tongsoHS">
                <?php echo $lop->getSoHSbyClassID($maLop);
                unset($lop); ?>
            </span>
        </h4>
    </div>
    <div class="col-12 mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã HS</th>
                    <th scope="col">Tên HS</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">user</th>
                    <th scope="col">password</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $hs = new HocSinh();
                $r = $hs->getListHocSinhPagebyClassId($maLop, $start, $limit);
                while ($set = $r->fetch()) :
                ?>
                    <tr>
                        <th scope="row"><?php echo $set[0] ?></th>
                        <td><?php echo $set[1] ?></td>
                        <td><?php echo $set[2] ?></td>
                        <td><?php echo $set[3] ?></td>
                        <td><?php echo $set[4] ?></td>
                        <td><?php echo $set[5] ?></td>
                        <td>
                            <?php
                            $lop = new Lop();
                            $l = $lop->getClassbyId($set[6]);
                            echo $l[1];
                            unset($lop);
                            unset($l);
                            ?>
                        </td>
                        <td>
                            <a href="./index.php?controller=teacher&action=editStudent&id=<?php echo $set[0] ?>&maLop=<?php echo $set[6] ?>" class="btn btn-warning">Sửa</a>
                            <a href="./index.php?controller=teacher&action=deleteStudent&id=<?php echo $set[0] ?>&maLop=<?php echo $set[6] ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                endwhile;
                unset($r);
                unset($hs);
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                    // if ($currenPage >1 && $page > 1) :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="./index.php?controller=teacher&action=showStudent&id=<?php echo $maLop?>&page=<?php if($currenPage<=1) echo 1; else echo ($currenPage-1);?>">Previous</a>
                    </li>
                <?php
                    // endif;
                ?>
                <?php
                    // if ($currenPage<$page && $page>1):
                ?>
                    <li class="page-item">
                        <a class="page-link" href="./index.php?controller=teacher&action=showStudent&id=<?php echo $maLop?>&page=<?php if($currenPage>=$page) echo $page;else echo ($currenPage + 1);?>">
                            Next
                        </a>
                    </li>
                <?php
                    // endif;
                ?>
            </ul>
        </nav>
    </div>
</div>
<script>
    let soHShientai = document.getElementsByClassName("soHShientai")[0];
    let tongsoHS = document.getElementsByClassName("tongsoHS")[0];
    if (parseInt(soHShientai.innerText) === parseInt(tongsoHS.innerText)) {
        document.getElementById("themhocsinh").style.display = "none";
        document.getElementById("themHSExcel").style.display = "none";
    }
</script>