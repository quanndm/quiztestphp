<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <section class="d-flex justify-content-between">
            <h2 class="text-center">Kế hoạch dạy học</h2>
            <a class="btn btn-primary" href="./index.php?controller=plan&action=back">Quay lại</a>
        </section>
    </div>
</div>
<!-- from them ke hoach -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Thêm kế hoạch dạy học
            </div>
            <div class="card-body">
                <form action="./index.php?controller=plan&action=add" method="POST">
                    <!-- nam hoc -->
                    <div class="mb-3">
                        <label for="">Năm học</label>
                        <select id="namhoc" name="maNamHoc" class="form-select" aria-label="Default select example">
                            <option value="">Chọn năm học</option>
                            <?php
                                $kh = new Kehoach();
                                $nam = $kh->getListNamHoc();
                                while($set = $nam->fetch()):
                            ?>
                                <option value="<?php echo$set[0]?>"><?php echo $set[1] ?></option>
                            <?php
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <!-- end nam hoc -->
                    <!-- hoc ky -->
                    <div class="mb-3">
                        <label for="">Học kỳ</label>
                        <select name="maHocKy" id="hocky" class="form-select" aria-label="Default select example">
                            <option value="">Chọn học kỳ</option>

                        </select>
                    </div>
                    <!-- end hoc ky -->
                    <!-- môn học -->
                    <div class="mb-3">
                        <label for="">Môn học</label>
                        <select name="maMon" id="monhoc" class="form-select" aria-label="Default select example">
                            <option value="">Chọn môn học</option>
                        </select>
                    </div>
                    <!-- end môn học -->
                    <!-- lop -->
                    <div class="mb-3">
                        <label for="">Lớp</label>
                        <select name="maLop" id="lophoc" class="form-select" aria-label="Default select example">
                            <option value="">Chọn lớp học</option>
                        </select>
                    </div>      
                    <!-- end lop -->
                    <!-- giao vien -->
                    <div class="mb-3">
                        <label for="">Giáo viên</label>
                        <select name="maGV" id="giaovien" class="form-select" aria-label="Default select example">
                            <option value="">Chọn giáo viên</option>
                        </select>
                    </div>  
                    <!-- end giao vien -->
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // năm học
        $('#namhoc').on("change", function(){
            const idnamhoc = $(this).val();
            if(idnamhoc){
                $.ajax({
                    type:"POST",
                    url: "./api/planApi.php",
                    data: "idnamhoc="+idnamhoc,
                    success:function(html){
                        $("#hocky").html(html);
                    }
                })
            }else{
                $("#hocky").html(`
                    <option value="">Chọn học kỳ</option>
                `)
                $("#monhoc").html(`
                    <option value="">Chọn môn học</option>
                `);
                $("#lophoc").html(`
                    <option value="">Chọn lớp học</option>
                `);
                $("#giaovien").html(`
                    <option value="">Chọn giáo viên</option>
                `);
            }
        })
        // học kỳ
        $('#hocky').on("change", function(){
            const idhocky = $(this).val();
            if(idhocky){
                $.ajax({
                    type:"POST",
                    url: "./api/planApi.php",
                    data: "idhocky="+idhocky,
                    success:function(html){
                        $("#monhoc").html(html);
                    }
                })
            }else{
                $("#monhoc").html(`
                    <option value="">Chọn môn học</option>
                `);
                $("#lophoc").html(`
                    <option value="">Chọn lớp học</option>
                `);
                $("#giaovien").html(`
                    <option value="">Chọn giáo viên</option>
                `);
            }
        })
        // môn học
        $('#monhoc').on("change", function(){
            const idmonhoc = $(this).val();
            const idnamhoc = $('#namhoc').val();
            const idhocky = $('#hocky').val();
            const obj = {
                "idmonhoc" : idmonhoc,
                "idnamhoc" : idnamhoc,
                "idhocky" : idhocky
            }
            if(idmonhoc){
                $.ajax({
                    type:"POST",
                    url: "./api/planApi.php",
                    data : {mydata: JSON.stringify(obj)},
                    success:function(html){
                        $("#lophoc").html(html);
                    }
                })
            }else{
                $("#lophoc").html(`
                    <option value="">Chọn lớp học</option>
                `);
                $("#giaovien").html(`
                    <option value="">Chọn giáo viên</option>
                `);
            }
        })
        // lớp
        $('#lophoc').on("change", function(){
            const idlophoc = $(this).val();
            if(idlophoc){
                $.ajax({
                    type:"POST",
                    url: "./api/planApi.php",
                    data: "idlophoc="+idlophoc,
                    success:function(html){
                        $("#giaovien").html(html);
                    }
                })
            }else{
                $("#giaovien").html(`
                    <option value="">Chọn giáo viên</option>
                `);
            }
        })
    })
</script>