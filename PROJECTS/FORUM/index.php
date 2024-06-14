<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tech Forum</title>
</head>

<body>
    <?php include './partials/_dbconnect.php' ;?>
    <?php include './partials/_header.php' ;?>

    <!-- sliders -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/code-coffee.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/code-laptop.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/coder-with-laptopsss.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/html.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/javascript.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/javascript-2.jfif" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- card -->
    <div class="container my-2 ">
        <h2 class="text-center">Language Catergories</h2>
        <div class="row">
            <!-- fetch catergories from database -->
            <?php 
          $sql = "SELECT * FROM `forum`";
          $result = mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result)){
            
            $id= $row['Category_id'];
            $categ = $row['Category_name'];
            $categdes = $row['Category_description'];
            echo '<div class="col md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/1000/600?'.$categ.',coding" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="Threadlist.php?$catid='.$id.'">'.$categ.'</a></h5>
                    <p class="card-text">'.substr($categdes,0,40).' ...</p>
                    <a href="Threadlist.php?$catid='.$id.'" " class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>';
          }
            ?>
       </div>
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