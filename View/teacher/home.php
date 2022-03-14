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
                            <th scope="col">Học kỳ</th>
                            <th scope="col">Năm học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $kehoach = new Kehoach();
                            $res = $kehoach->getKehoachbyGV($_SESSION['maGV']);
                            while ($set = $res->fetch()):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $set[0] ?></th>
                            <td><?php echo $set[1] ?></td>
                            <td><?php echo $set[3] ?></td>
                            <td><?php echo $set[4] ?></td>
                        </tr>
                        <?php
                            endwhile;
                            unset($set);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>