<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="./static/favicon.png">
    <title>PGFinder</title>
    <?php include 'partials/_header.php';?>
</header>

<body >
    <!-- connecting to database -->
    <?php include 'partials/_dbconnect.php';?>      
    <!-- posting details to database -->
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            // Insert into register db
            $pgname = $_POST['pgname'];
            $pgdesc = $_POST['description'];
            $loc = $_POST['location'];
            $address = $_POST['address'];
            //To avoid XSS attack
            $pgname = str_replace("<", "&lt;", $pgname);
            $pgname = str_replace(">", "&gt;", $pgname); 

            $pgdesc = str_replace("<", "&lt;", $pgdesc);
            $pgdesc = str_replace(">", "&gt;", $pgdesc); 

            $loc = str_replace("<", "&lt;", $loc);
            $loc = str_replace(">", "&gt;", $loc); 

            $address = str_replace("<", "&lt;", $address);
            $address = str_replace(">", "&gt;", $address); 


            $sql = "INSERT INTO `register` (`name`, `description`, `url`, `address`) VALUES ( '$pgname', '$pgdesc', '$loc', '$address')";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your PG has been registered...Thank You for choosing PGFinder &#128522;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    ?>
    <!-- header -->
    <div class="p-4 bg-lg text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center badge bg-secondary">
                <h1>Enter Details of Your PG</h1>
            </div>
        </div>
    </div>
    <!-- Taking details of user -->
    <?php echo '
    <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
        <div class="form-group container">
            <label for="exampleInputEmail1">PG Name</label>
            <input type="text" class="form-control border border-info" id="pgname" name="pgname" aria-describedby="pgname" placeholder="Enter PG name" required>
            <small id="emailHelp" class="form-text text-muted">Please enter exact name</small>
        </div>
        <div class="form-group container">
            <label for="exampleInputPassword1">PG Desciption</label>
            <textarea class="form-control border border-info" id="description" name="description" placeholder="Enter PG Desciption" rows="3" required></textarea>
        </div>
        <div class="form-group container">
            <label for="exampleInputEmail1">PG Location</label>
            <input type="url" class="form-control border border-info" id="location" name="location" onfocus="this.value=""" aria-describedby="emailHelp" placeholder="Enter Google Map Url">
            <div class="text-center font-weight-bold">OR</div>
            <input type="text" class="form-control border border-info" id="address" name="address" onfocus="this.value=""" aria-describedby="emailHelp" placeholder="Enter Address">
        </div>
        <div class="container" style="text-align: right;">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>';
    ?>
    
</body>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>

</html>