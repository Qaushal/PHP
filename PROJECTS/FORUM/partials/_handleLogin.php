<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $user_email=$_POST['loginemail'];
    $user_password=$_POST['password'];
    $existsuser = "SELECT * FROM `user` WHERE User_email = '$user_email'";
    $result = mysqli_query($conn,$existsuser);
    $numrow = mysqli_num_rows($result);
    if($numrow>0){  
        $row = mysqli_fetch_assoc($result);
        if(password_verify($user_password,$row['User_Password'])){
            $login=true;
            session_start();
            $_SESSION['Loggedin'] = true;
            $_SESSION['Srno'] = $row['Srno'];
            $_SESSION['useremail'] = $user_email;
            
            header("location: /Kaushal/FORUM/index.php");
           
            }
            else{
               $showError = "Invalid Credentials";
            }
        }
        else{
            $showError = "Invalid Credentials";
        }
    
}
?>

