<div class="row">
    <div class="col-xs-12">
        <h2 class="text-center mt-5 mb-5">Thông tin cá nhân</h2>
    </div>
</div>
<div class="row" style="font-size: 1.2rem;">
    <div class="col-xs-12 col-sm-3">
        <img src="./src/image/avaicon.png" alt="" width="100%">
    </div>
    <div class="col-xs-12 col-sm-9">
        <ul>
            <li>
                <div class="row">
                    <div class="col-3">
                        <strong>Họ và tên: </strong>
                    </div>
                    <div class="col-9">
                        <p><?php echo $_SESSION['tenHS']?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">
                        <strong>Địa chỉ: </strong>
                    </div>
                    <div class="col-9">
                        <p><?php echo $_SESSION['diaChi']?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">
                        <strong>Điện thoại:</strong>
                    </div>
                    <div class="col-9">
                        <p><?php echo $_SESSION['dienThoai']?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">
                        <strong>Lớp:</strong>
                    </div>
                    <div class="col-9">
                        <p>
                            <?php
                                $lop = new Lop();
                                $r = $lop->getClassbyId($_SESSION['maLop']);
                                echo $r[1];
                            ?>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
        
    </div>
</div>