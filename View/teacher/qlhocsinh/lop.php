<div class="row">
    <div class="col-12 d-flex justify-content-between mt-4 mb-4">
        <h3>Học sinh</h3>
    </div>
    
    <div class="col-12 mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Mã lớp</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Chức năng</th>
                </tr>
                
            </thead>
            <tbody>
                <?php 
                    $lop = new Lop();
                    $r = $lop->getListClassbyTeacherID($_SESSION['maGV']);
                    while ($set = $r->fetch()) :
                ?>
                <tr>
                    <td><?php echo $set[0] ?></td>
                    <td><?php echo $set[1] ?></td>
                    <td><a href="./index.php?controller=teacher&action=showStudent&id=<?php echo $set[0] ?>" class="btn btn-primary">Chi tiết</a></td>
                </tr>
                
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>