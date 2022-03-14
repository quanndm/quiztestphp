<div class="row">
    <div class="col-12 p-3 mt-2 mb-2">
        <h1>Dashboard</h1>
    </div>
</div>
<!-- table giáo viên -->
<div class="row">
    <div class="col-ms-12 p-3">
        <div class="card">
            <div class="card-header">
                <h2>Giáo viên </h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">mã GV</th>
                            <th scope="col">Tên GV</th>
                            <th scope="col">username</th>
                            <th scope="col">password</th>
                            <th scope="col">roll</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $gv = new Giaovien();
                            $r = $gv->getListTop3();
                            while($set = $r->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set[0] ?></th>
                            <td><?php echo $set[1] ?></td>
                            <td><?php echo $set[2] ?></td>
                            <td><?php echo $set[3] ?></td>
                            <td><?php echo $set[4] ?></td>
                        </tr>
                        <?php
                            endwhile;
                            unset($r);    
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- table Lớp -->
<div class="row">
    <div class="col-ms-12 p-3">
        <div class="card">
            <div class="card-header">
                <h2>Lớp</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Mã Lớp</th>
                            <th scope="col">Tên Lớp</th>
                            <th scope="col">Sỉ Số</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $lop = new Lop();
                            $r = $lop->getListTop3();
                            while($set = $r->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set[0] ?></th>
                            <td><?php echo $set[1] ?></td>
                            <td><?php echo $set[2] ?></td>
                        </tr>
                        <?php
                            endwhile;
                            unset($r);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- table Môn học -->
<div class="row">
    <div class="col-ms-12 p-3">
        <div class="card">
            <div class="card-header">
                <h2>Môn học</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Mã Môn</th>
                            <th scope="col">Tên Môn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mon = new Mon();
                            $r = $mon->getListTop3();
                            while($set = $r->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set[0] ?></th>
                            <td><?php echo $set[1] ?></td>
                        </tr>
                        <?php
                            endwhile;
                            unset($r);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ke hoach day học -->
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
                            <th scope="col">Tên Lớp</th>
                            <th scope="col">Tên Môn</th>
                            <th scope="col">Tên GV</th>
                            <th scope="col">Học kỳ</th>
                            <th scope="col">Năm học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $kehoach = new Kehoach();
                            $r = $kehoach->getList();
                            while($set = $r->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set[0] ?></th>
                            <td><?php echo $set[1] ?></td>
                            <td><?php echo $set[2] ?></td>
                            <td><?php echo $set[3] ?></td>
                            <td><?php echo $set[4]=="2021"?'2021-2022':'2022-2023'; ?></td>
                        </tr>
                        <?php
                            endwhile;
                            unset($r);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>