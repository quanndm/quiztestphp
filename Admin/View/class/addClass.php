<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <h2>Lớp học</h2>
    </div>
</div>
<!-- form lop hoc -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Thêm lớp học
            </div>
            <div class="card-body">
                <form action="./index.php?controller=class&action=add" method="POST">
                    <div class="mb-3">
                        <label for="tenLop" class="form-label">Tên Lớp</label>
                        <input type="text" class="form-control" id="tenLop" name="tenLop">
                    </div>
                    <div class="mb-3">
                        <label for="siso" class="form-label">Sỉ Số</label>
                        <input type="number" min="1" max="40" class="form-control" id="siso" name="siso">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>