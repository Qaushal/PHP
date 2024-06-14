<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['signupemail'];
    $user_password = $_POST['signuppassword'];
    $user_cpassword = $_POST['signupcpassword'];

    $existsuser = "SELECT * FROM `user` WHERE User_email = '$user_email'";
    $result = mysqli_query($conn, $existsuser);
    $numrow = mysqli_num_rows($result);
    if ($numrow > 0) {
        $showError = "Email is already Exists";
    } else {
        if ($user_password == $user_cpassword) {
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`Srno`, `User_email`, `User_Password`, `TimeStamp`) VALUES ('', '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: /Kaushal/FORUM/index.php?signupsuccess=true");
                exit();
            }

        } else {
            $showError = "Password do not match";
        }
    }
    header("location: index.php?signupsuccess=false&error=$showError");
}
?>