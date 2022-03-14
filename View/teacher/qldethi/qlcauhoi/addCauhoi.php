<?php
if ($note != "excel") :
    $maBD = $_GET['maBD'];
    $maMon = $_GET['maMon'];
?>
    <div class="row">
        <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
            <h2>Câu hỏi</h2>
            <div>
                <a href="./index.php?controller=teacher&action=backQuestion&maBD=<?=$maBD?>&maMon=<?=$maMon?>" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
        <div class="col-12">
            <form method="POST" action="./index.php?controller=teacher&action=addQuestionBtn">
                <div class="mb-3">
                    <label class="form-label">Nội dung</label>
                    <input type="text" class="form-control" name="noiDung">
                </div>
                <div class="mb-3">
                    <label class="form-label">Đáp án A</label>
                    <input type="text" class="form-control" name="dapAnA">
                </div>
                <div class="mb-3">
                    <label class="form-label">Đáp án B</label>
                    <input type="text" class="form-control" name="dapAnB">
                </div>
                <div class="mb-3">
                    <label class="form-label">Đáp án C</label>
                    <input type="text" class="form-control" name="dapAnC">
                </div>
                <div class="mb-3">
                    <label class="form-label">Đáp án D</label>
                    <input type="text" class="form-control" name="dapAnD">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kết quả</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ketqua" id="dapAnA" value="A" checked>
                        <label class="form-check-label" for="dapAnA">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ketqua" id="dapAnB" value="B">
                        <label class="form-check-label" for="dapAnB">B</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ketqua" id="dapAnC" value="C">
                        <label class="form-check-label" for="dapAnC">C</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ketqua" id="dapAnD" value="D">
                        <label class="form-check-label" for="dapAnD">D</label>
                    </div>
                </div>
                <input type="hidden" name="maBD" value="<?php echo $_GET['maBD'] ?>">
                <input type="hidden" name="maMon" value="<?php echo $maMon ?>">
                <input type="submit" class="btn btn-primary" value="Thêm câu hỏi" name="submit_question">
            </form>
        </div>
    </div>
<?php
else :
?>
    <div class="row">
        <div class="col-12 d-flex justify-content-between mt-4 mb-4" style="align-items: center;">
            <h2>Câu hỏi</h2>
            <div>
                <a href="./src/files/fileDemoAddQuestion.csv" download="fileDemo.csv" class="btn btn-primary">Tải file mẫu</a>
                <a href="./index.php?controller=teacher&action=backExam" class="btn btn-primary">Quay lại</a>
            </div>

        </div>
        <div class="col-12">
            <h3 class="text-center">Thêm file excel câu hỏi</h3>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <form action="./index.php?controller=teacher&action=addQuestionExcel" enctype="multipart/form-data" method="POST" style="display: block;">
                <input type="file" name="file" id="file" class="file">
                <input type="hidden" name="maBD" value="<?php echo $_GET['id'] ?>">
                <input type="hidden" name="maMon" value="<?php echo $_GET['maMon'] ?>">
                <div class="d-flex">
                    <input type="text" name="file-name" id="file-name" class="file-name" readonly="readonly">
                    <input type="button" class="btnAddFile" value="select">
                </div><br>
                <input type="submit" name="submit_file" style="margin: 0 auto; display: block;" class="btn btn-primary" value="Thêm câu hỏi">
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btnAddFile').on('click', function() {
                $('.file').trigger('click');
            });

            $('.file').on('change', function() {
                var fileName = $(this)[0].files[0].name;
                $('#file-name').val(fileName);
            });
        })
    </script>
<?php
endif;
?>