<div id="top" class="d-flex flex-column flex-shrink-0 p-3 text-white sidemenu" style="width: 240px;min-height: 100vh;background: #343a40; position: relative;">
    <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="./src/image/avaimage.png" style="width: 32px; height: 32px;" class="me-3" alt="">
        <span class="fs-4">Admin page</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- <li class="mb-3">
            <a href="./index.php" class="nav-link text-white" aria-current="page">
                <i class='bx bx-home-alt me-2'></i>
                Trang chủ
            </a>
        </li> -->
        <li class="mb-3">
            <a href="./index.php?controller=teacher&action=show" class="nav-link text-white">
                <i class='bx bxs-user-detail me-2'></i>
                Giáo viên
            </a>
        </li>
        <li class="mb-3">
            <a href="./index.php?controller=subject&action=show" class="nav-link text-white">
            <i class='bx bxs-user-pin me-2'></i>
                Môn học
            </a>
        </li>
        <li class="mb-3">
            <a href="./index.php?controller=class&action=show" class="nav-link text-white">
                <i class='bx bxs-user-pin me-2'></i>
                Lớp
            </a>
        </li>
        <li class="mb-3">
            <a href="./index.php?controller=plan&action=show" class="nav-link text-white">
            <i class='bx bxs-food-menu me-2' ></i>
                Kế hoạch dạy học
            </a>
        </li>
        <li class="mb-3">
            <a href="../" class="nav-link text-white">
            <i class='bx bx-log-out me-2'></i>
                Exit
            </a>
        </li>
    </ul>
    <!-- <a href="#top" class="arrow text-white" style="position: fixed; bottom: 20px; left: 20px; padding: 10px;border: 2px solid; border-radius: 5px;">
        <i class='bx bx-up-arrow fs-4'></i>
    </a> -->
</div>