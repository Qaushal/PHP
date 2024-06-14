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
     $id=$_GET['$catid'];
     $sql = "SELECT * FROM `forum` WHERE Category_id=$id;";
     $result = mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
         
         $categ = $row['Category_name'];
         $categdes = $row['Category_description'];
         }
         ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $th_title = $_POST['title'];
        $th_title = str_replace("<" , "&lt;" , $th_title);
        $th_title = str_replace(">" , "&gt;" , $th_title);

        $th_desc = $_POST['desc'];
        $th_title = str_replace("<" , "&lt;" , $th_title);
        $th_title = str_replace(">" , "&gt;" , $th_title);
      
        $Srno = $_POST['Srno']; 
        $sql=" INSERT INTO `thread` (`Thread_id`, `Thread_Title`, `Thread_Desc`, `Thread_cat_id`, `Thread_user_id`, `Timestamp`) VALUES ('', '$th_title', '$th_desc', '$id', '$Srno', current_timestamp())"; 
    $result = mysqli_query($conn,$sql);
    $showAlert = true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucsess!</strong> Your Qurey is being added to our Forum.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
        }
    ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 ">Welcome to <?php echo $categ; ?> Forums</h1>
            <p class="lead"><?php echo $categdes;?></p>
            <hr class="my-4">
            <p>This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same respect
                you would a public park.
                Improve the Discussion.
                Be Agreeable, Even When You Disagree.
                Always Be Civil.
                Keep It Tidy.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
  if(isset($_SESSION['Loggedin']) && $_SESSION['Loggedin']==true){
    echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action=" '.$_SERVER["REQUEST_URI"] .'" method="post">


    <div class="form-group">
        <label for="exampleInputEmail1">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Keep your title as crisp and short as
            possible.</small>
    </div>
        <input type="hidden" name="Srno" value="'.$_SESSION['Srno'].'">

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    </div>';
    }else{
        echo ' 
       
        <div class="container">
          <h1 class="py-2">Start a Discussion</h1>
          <p class="lead">You are not Logged in. Please login to Start a Discussion.</p>
        </div>
       '; 
        
    }
?>
    <div class="container">
        <h2 class="py-2">Browser Questions</h2>
        <?php
     $id=$_GET['$catid'];
     $sql = "SELECT * FROM `thread` WHERE Thread_cat_id=$id;";
     $result = mysqli_query($conn,$sql);
     $noResult=true;
     while($row=mysqli_fetch_assoc($result)){
         $noResult=false;
      $id = $row['Thread_id'];
      $title = $row['Thread_Title'];
      $desc = $row['Thread_Desc'];
      $Thread_user_id = $row['Thread_user_id'];
      $sql2= "SELECT User_email FROM `user` WHERE Srno='$Thread_user_id'";
      $result2 = mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($result2);
      
      
        echo  '<div class="media my-4">
        <img src="./img/avatar.png" width="70px" class="mr-3" alt="...">
        <div class="media-body">
   
                <h5 class="mt-0"><a href="Thread.php?Threadid='.$id.'"> '.$title. ' </a></h5>
                '.$desc.'
            </div>
                 <p class="font-weight-bold my-0">'. 'Asked by : '. strstr($row2['User_email'],"@",true) .' </p>
        </div>';
   
    }
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Question Found</h1>
    <p class="lead">Be the First person to ask the Question.</p>
  </div>
</div>';
    }
    ?>


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