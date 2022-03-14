<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fs-4" >Xin chào!<?php echo $_SESSION['tenGV'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item fs-5">
                    <a class="nav-link" href="./index.php?controller=home&action=home">Kế hoạch</a>
                </li>
                <li class="nav-item fs-5">
                    <a class="nav-link" href="./index.php?controller=teacher&action=showAllClass">Học sinh</a>
                </li>
                <li class="nav-item fs-5">
                    <a class="nav-link" href="./index.php?controller=teacher&action=showExams">Đề thi</a>
                </li>
                <li class="nav-item fs-5">
                    <a class="nav-link" href="./index.php?controller=teacher&action=showScoreStudent">Bảng điểm</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <a class="btn btn-primary" href="./index.php?controller=login&action=logout">Đăng xuất</a>
            </ul>
        </div>
    </div>
</nav>