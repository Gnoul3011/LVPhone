<?php

  //echo
  
  if ($page = isset($_GET['id'])? $_GET['id'] :'1') {
    switch ($page) {
      case '1':
        include('./inc/home.php');
        break;
      case '2':
        include('./inc/bill.php');
        break;
      case '3':
        include('./inc/cate.php');
        break;
      case '4':
        include('./inc/product.php');
        break;
      case '5':
        include('./inc/feedback.php');
        break;
      case '6':
        include('./inc/account.php');
        break;
      case '7':
        include('./inc/setup.php');
        break;
    }
  }
