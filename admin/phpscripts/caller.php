<?php
//DONT PUT THE LINK TO CALLER.PHP IN THE CONFIG FILES
  require_once("config.php");


  if (isset($_GET['caller_id'])) {
    $dir = $_GET['caller_id'];
    if ($dir == 'logout') {
      logged_out();
    }else {
      echo "caller is was passed incorrectly";
    }
  }


 ?>
