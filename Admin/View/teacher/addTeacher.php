<div class="row">
    <div class="col-12 p-3 mt-2 mb-2 ">
        <h2>Giáo viên</h2>
    </div>
</div>
<!-- from them giao vien -->
<div class="row">
    <div class="col-12 p-3">
        <div class="card">
            <div class="card-header">
                Thêm giáo viên
            </div>
            <div class="card-body">
                <form action="./index.php?controller=teacher&action=add" method="POST">
                    <div class="mb-3">
                        <label for="teacherName" class="form-label">Tên giáo viên</label>
                        <input type="text" class="form-control" id="teacherName" name="teacherName">
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>