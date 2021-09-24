<?php
session_start();
// logo
echo '<nav class="navbar grid navbar-expand-lg navbar-lg bg-dark" style="height:50px;">
<a href="/forum" >
           <img src="./static/logo.png" style="width:60px; height:60px; padding:0px 0px 0px 0px; margin:0px 0px 0px 0px;" >
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-light" href="../forum/about.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../forum/contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../forum/register.php" target="_blank">Register Your PG Now!</a>
      </li>
    </ul>';
    
    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';
    //Login and search
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<p class="fw-bolder mx-4 my-2 text-center text-light" >Welcome '. $_SESSION['useremail']. '</p>
      <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" action="search.php" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
          </form>';
    }
    
    else{ 
      echo '
      <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" action="search.php" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>';
      echo '
      <button class="btn btn-outline-success ml-2 bg-success text-white" data-toggle="modal" data-target="#loginModal">Login</button>
      <button class="btn btn-outline-success mx-2 bg-success text-white" data-toggle="modal" data-target="#signupModal">Signup</button>
      ';
    }
      
    echo '</div>
      </div>
      </nav>';
      if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
              echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                  <strong>Success!</strong> You can now login
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
      }
?>