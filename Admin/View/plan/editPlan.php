<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <section class="d-flex justify-content-between">
            <h2 class="text-center">Kế hoạch dạy học</h2>
            <a class="btn btn-primary" href="./index.php?controller=plan&action=back">Quay lại</a>
        </section>
    </div>
</div>
<!-- form kehoach day hoc -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Sửa kế hoạch dạy học
            </div>
            <div class="card-body">
                <form action="./index.php?controller=plan&action=edit" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Lớp</label>
                        <select name="maLop" class="form-select" aria-label="Default select example">
                            <?php
                            $kehoach = new Kehoach();
                            $k =  $kehoach->getKehoachbyid($_GET['maLop'], $_GET['maMon'], $_GET['maHocky'], $_GET['manamhoc']);
                            $gv = new Lop();
                            $r = $gv->getListClass();
                            while ($set = $r->fetch()) :
                                if ($set['maLop'] == $k['maLop']):
                            ?>
                                <option selected value="<?php echo $set[0] ?>" ><?php echo $set[1]?></option>
                            <?php
                            endif;    
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Môn</label>
                        <select name="maMon" class="form-select" aria-label="Default select example">
                            <option selected>Chọn Môn</option>
                            <?php
                            $gv = new Mon();
                            $r = $gv->getListMon();
                            while ($set = $r->fetch()) :
                            ?>
                                <option <?php if ($set['maMon'] == $k['maMon']) echo "selected" ?> value="<?php echo $set[0] ?>"><?php echo $set[1] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giáo viên</label>
                        <select name="maGV" class="form-select" aria-label="Default select example">
                            <option selected>Chọn Giáo viên</option>
                            <?php
                            $gv = new Giaovien();
                            $r = $gv->getListGiaoVien();
                            while ($set = $r->fetch()) :
                            ?>
                                <option <?php if ($set['maGV'] == $k['maGV']) echo "selected" ?> value="<?php echo $set[0] ?>"><?php echo $set[1] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Học kỳ</label>
                        <select name="mahocKy" class="form-select" aria-label="Default select example">
                            <?php
                            $hk = $kehoach->getListHocKy();
                            while ($set = $hk->fetch()) :
                            ?>
                                <option <?php if ($set['id'] == $k['idhocKy']) echo "selected" ?> value="<?php echo $set[0] ?>"><?php echo $set[1] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Năm học</label>
                        <select name="manamHoc" class="form-select" aria-label="Default select example">
                            <?php
                            $namhoc = $kehoach->getListNamHoc();
                            while ($set = $namhoc->fetch()) :
                            ?>
                                <option <?php if ($set['id'] == $k['idnamHoc']) echo "selected" ?> value="<?php echo $set[0] ?>"><?php echo $set[1] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="mlop" value="<?php echo $_GET['maLop'] ?>">
                    <input type="hidden" name="mmon" value="<?php echo $_GET['maMon'] ?>">
                    <input type="hidden" name="mhk" value="<?php echo $k['idhocKy'] ?>">
                    <input type="hidden" name="mnamhoc" value="<?php echo $k['idnamHoc'] ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>