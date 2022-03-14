<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../src/lib/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="../src/style/login/Style.css">
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="./index.php?controller=login&action=login">
            <img class="mb-4" src="../src/image/logologin.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Đăng nhập</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="mb-3">
                <strong>Đăng nhập với vai trò:</strong><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permission" id="inlineRadio1" value="giaovien" checked>
                    <label class="form-check-label" for="inlineRadio1">Giáo viên</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="permission" id="inlineRadio2" value="sinhvien">
                    <label class="form-check-label" for="inlineRadio2">Học sinh</label>
                </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng nhập</button>
        </form>
    </main>
    <script src="../src/lib/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>