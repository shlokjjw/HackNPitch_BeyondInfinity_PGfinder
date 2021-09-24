<?php 
session_start();
echo "Logging Out......Please wait.....";
session_destroy();
header("Location: /forum")
?>