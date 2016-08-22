<?php

/***********************
CHECK IF POST IS LOADED DIRECTLY 
***********************/
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  $request = true;
} else {
  $request = false;
}

if (!$request) { header("Location:index.php#PAGENAME"); } 
?>

<!--  INCLUDE/PASTE HERE THE NORMAL HTML OF THE PAGE  -->