<!-- INSERT INTO `thread` (`Thread_id`, `Thread_Title`, `Thread_Desc`, `Thread_cat_id`, `Thread_user_id`, `Timestamp`) VALUES ('1', 'Installation Problem', 'Unable to install Python on windows', '1', '0', current_timestamp()); -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Forum</title>
</head>

<body>
    <?php include './partials/_dbconnect.php' ;?>
    <?php include './partials/_header.php' ;?>
    <?php
     $id=$_GET['Threadid'];
     $sql = "SELECT * FROM `thread` WHERE Thread_id=$id;";
     $result = mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
       
        $title = $row['Thread_Title'];
        $desc = $row['Thread_Desc'];
        $commented = $row['Thread_user_id'];
       
        $sql2= "SELECT User_email FROM `user` WHERE Srno='$commented'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $postedby =$row2['User_email'];
       
     }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $comment = $_POST['comment'];
        $comment = str_replace("<" , "&lt;" , $comment);
        $comment = str_replace(">" , "&gt;" , $comment);
       
        $Srno = $_POST['Srno']; 
        
        $sql="INSERT INTO `discussion` (`Discussion_id`, `Discussion_content`, `Thread_id`, `Discussion_by`, `Discussion_time`) VALUES ('', '$comment', '$id', '$Srno', current_timestamp())"; 
    $result = mysqli_query($conn,$sql);
    $showAlert = true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucsess!</strong> Your Comment has been added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
        }
    ?>


    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 "><?php echo $title; ?> </h1>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same respect
                you would a public park.
                Improve the Discussion.
                Be Agreeable, Even When You Disagree.
                Always Be Civil.
                Keep It Tidy.</p>
            <p>Post by : <b><?php echo $postedby; ?> </b></p>
        </div>
    </div>

   <?php
  if(isset($_SESSION['Loggedin']) && $_SESSION['Loggedin']==true){
    echo ' <div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
        <form>
        
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Type your Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        <input type="hidden" name="Srno" value="'.$_SESSION['Srno'].'">
                </div>

                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        </form>

    </div>';
    }else{
        echo ' 
       
        <div class="container">
          <h1 class="py-2">Post a Comment</h1>
          <p class="lead">You are not Logged in. Please login to be able to post a comment.</p>
        </div>
       '; 
        
    }
?>
    <div class="container">
        <h2 class="py-2">Discussions</h2>
        <?php
        $noResult=true;
     $id=$_GET['Threadid'];
     $sql = "SELECT * FROM `discussion` WHERE Thread_id=$id;";
     $result = mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
         $noResult=false;
      $id = $row['Discussion_id'];
      $content = $row['Discussion_content'];
      $timestamp = strtotime($row['Discussion_time']);
      $date = date('d-m-Y', $timestamp);
      $time = date('g:i a', $timestamp);
      $Thread_user_id = $row['Discussion_by']; 
      $sql2= "SELECT User_email FROM `user` WHERE Srno='$Thread_user_id'";
      $result2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($result2);
     
        echo  '<div class="media my-4">
        <img src="./img/comment.png" width="50px" class="mr-3" alt="...">
        <div class="media-body">
               <p class="font-weight-bold my-0">'.strstr($row2['User_email'],"@",true).' at '.$date.' ('.$time.')</p>
                '.$content.'
            </div>
        </div>';
    }   
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Question Found</h1>
    <p class="lead">Be the First person to ask the Question.</p>
  </div>
</div>';}
    ?>

    </div>
    <?php include './partials/_footer.php' ;?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>