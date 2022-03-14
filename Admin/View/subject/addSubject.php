<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <section class="d-flex justify-content-between">
            <h2>Môn học</h2>
            <a class="btn btn-primary" href="./index.php?controller=subject&action=back">Quay lại</a>
        </section>
    </div>
</div>
<!-- form mon hoc -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Thêm môn học
            </div>
            <div class="card-body">
                <form action="./index.php?controller=subject&action=add" method="POST">
                    <div class="mb-3">
                        <label for="maMon" class="form-label">Mã Môn</label>
                        <input type="text" class="form-control" id="maMon" name="maMon">
                    </div>
                    <div class="mb-3">
                        <label for="tenMon" class="form-label">Tên Môn</label>
                        <input type="text" class="form-control" id="tenMon" name="tenMon">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>