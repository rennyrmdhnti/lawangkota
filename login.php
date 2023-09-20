<?php
session_start();


//cek cookie
if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Autentikasi berhasil, atur sesi nama_pengguna
            $_SESSION["login"] = true;
            $_SESSION["nama_pengguna"] = $row["username"]; // Sesuaikan dengan nama kolom yang benar
            // Cek remember me
            if (isset($_POST['remember'])) {
                // Buat cookie
                setcookie('login', 'true', time() + 60);
            }
            // Arahkan ke halaman index
            header("Location: index.php");
            exit;
        }
    }
    
    $error = true;
}

// if (isset($_POST["login"])) {

//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

//     //cek username
//     if (mysqli_num_rows($result) === 1) {

//         //cek password
//         $row = mysqli_fetch_assoc($result);
//         if (password_verify($password, $row["password"])) {
//             //cek session
//             $_SESSION["login"] = true;
//             //cek remember me
//             if (isset($_POST['remember'])) {
//                 //membuat cookie
//                 setcookie('login', 'true', time() + 60);
//             }
//             //mengarahkan ke form index
//             header("Location: index.php");
//             exit;
//         }
//     }
    
//     $error = true;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <title>Lawang Kota - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-login">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-4 d-none d-lg-block "></div>
                            <div class="col-lg-10 ">
                                <div class="p-3">
                                    <div class="card-body text-center">

                                        <h3 class="text-dark mb-0">Layanan & Wadah Informasi Angka Kota Banjarmasin</h3>

                                    </div>

                                    <!-- ini adalah pesan ketika login gagal -->
                                    <?php if (isset($error)) : ?>
                                        <div class="alert alert-danger">Username Or Password Is Wrong!</div>
                                    <?php endif; ?>

                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="remember" id="remember" value="Remember Me" />
                                            <label style='font-size:16px;' for="remember">Remember me</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Login</button>
                                        <hr>
                                        <a type="submit" href="utama.php" name="submit" class="btn btn-primary btn-user btn-block">Kembali</a>
                                    </form>

                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <br>
                                    <!-- <div class="text-center">
                                        <h1 class="small">Don't have an account yet? <a href="register.php">Sign up!</a>
                                        </h1>

                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>
</body>

</html>