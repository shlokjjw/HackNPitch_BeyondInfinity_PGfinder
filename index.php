<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="googlemap.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- website icon -->
    <link rel="icon" href="./static/favicon.png">

    <style>
        #findit{
            border-radius: 50px;
            padding: 5px;
        }
        #ques {
            margin:auto;
        }
    </style>
    <title>PGFinder</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';
    include 'partials/_header.php'; ?>
    <!-- Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item" style="height:50rem">
                <a href="#ques"><img src="./static/home3.png" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item active" style="height:50rem; background-repeat: no-repeat;">
                <a href="#ques"><img src="./static/home1.png" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item" style="height:50rem; ">
                <a href="#ques"><img src="./static/home2.png" class="d-block w-100" alt="..."></a>
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

    <!-- Hostel list starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center text-white bg-dark my-4" id="findit">&#128525;&nbsp;  Find Your PG Now &nbsp;&#128525;</h2>
        <div class="container row my-4">
            <!-- Fetch all the categories and use a loop to iterate through hostels -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $catid = $row['id'];
                $cat = $row['name'];
                $desc = $row['description'];
                $loc = $row['location'];
                $imga = $row['image'];
                echo '
                    <div class="col-md-4 my-4">
                    <div class="card" style="width: 18rem;">
                        <img src=' . $imga . ' class="card-img-top" alt="image of pg">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threadlist.php?catid=' . $catid . '">' . $cat . '</a></h5>
                            <p class="card-text">' . substr($desc, 0, 200) . '</p>
                            <a href="threadlist.php?catid=' . $catid . '" class="btn btn-primary">View Details</a>
                            <a href="'.$loc.'" target="_blank" class="btn btn-info">View Location</a>
                        </div>
                    </div>
                    </div>';
            }
            ?>


        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>