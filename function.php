<?php
// ini code untuk register.php
function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $rpassword = mysqli_real_escape_string($conn, $data["rpassword"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username  FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('Username Already Registered!') </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $rpassword) {
        echo "<script> alert('Incorrect Password Confirmation!') </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // menambahkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>