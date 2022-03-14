<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand fs-4">Xin chào! <?php echo $_SESSION['tenHS'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="nav_container">
                <!-- <li class="nav-item fs-5 ">
                    <a class="nav-link" href="./index.php?controller=home&action=home">Thông tin cá nhân</a>
                </li> -->
                <li class="nav-item fs-5">
                    <a class="nav-link" href="./index.php?controller=student&action=xemDe">Kiểm tra</a>
                </li>
                <li class="nav-item fs-5">
                    <a class="nav-link" href="./index.php?controller=student&action=xemdiem">Xem điểm</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <a class="btn btn-primary" href="./index.php?controller=login&action=logout">Đăng xuất</a>
            </ul>
        </div>
    </div>
</nav>